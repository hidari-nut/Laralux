<?php

namespace App\Http\Controllers;

use App\Models\Point;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        $this->authorize('showUsers-permission', $user);
        $users = User::whereIn('roles_id', [1, 2])->get();
        return view('users.userslist', ['datas' => $users]);
    }

    public function getAllMember()
    {
        $user = Auth::user();
        // dd($user);
        $this->authorize('isMember-role', $user);
        // $users = User::whereIn('roles_id', [4])->get();

        $users = User::whereIn('roles_id', [3, 4])
                ->whereHas('bookings')
                ->distinct()
                ->get();
        return view('membership.index', ['datas' => $users]);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'file_image' => ['nullable', 'image', 'max:2048'],
        ]);

        if ($request->hasFile('file_image')) {
            $file = $request->file('file_image');
            $filename = time() . "_" . preg_replace('/\s+/', '_', $file->getClientOriginalName());
            $file->move('assets/img/user', $filename);
        } else {
            $filename = "noimage.jpeg";
        }

        User::create([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'password' => Hash::make($request->get('password')),
            'img' => $filename,
            'roles_id' => $request->get('role'),
        ]);
        return redirect()->route('user.index')->with('success', 'Profile Created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = User::find($id);
        return view('users.profile', ['data' => $data]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'password' => ['nullable', 'string', 'min:8', 'confirmed'],
            'profile_image' => ['nullable', 'image', 'max:2048'],
        ]);
        
        $updatedUser = User::find($id);
        $updatedUser->name = $request->name;
        if ($request->hasFile('profile_image')) {
            if (($updatedUser->img) && ($updatedUser->img != "noimage.jpeg")) {
                unlink('assets/img/user/' . $updatedUser->img);
            }
            $file = $request->file('profile_image');
            $filename = time().'_'.preg_replace('/\s+/', '_', $file->getClientOriginalName());
            $file->move('assets/img/user', $filename);
            $updatedUser->img = $filename;
        }
        $updatedUser->save();
        return redirect()->route('user.edit', $id)->with('success', 'Profile updated successfully.');
    }

    public function updateStaff(Request $request, string $id)
    {
        $updatedData = User::find($id);
        $updatedData->name = $request->get('name');
        $updatedData->roles_id = $request->get('role');
        if ($request->hasFile('file_image')) {
            if (($updatedData->img) && ($updatedData->img != "noimage.jpeg")) {
                unlink('assets/img/user/' . $updatedData->img);
            }
            $file = $request->file('file_image');
            $filename = time().'_'.preg_replace('/\s+/', '_', $file->getClientOriginalName());
            $file->move('assets/img/user', $filename);
            $updatedData->img = $filename;
        }
        
        $updatedData->save();
        return redirect()->route('user.index', $id)->with('success', 'Profile updated successfully.');
    }

    public function promoteCustomer(Request $request, string $id)
    {
        $updatedData = User::find($id);
        $updatedData->roles_id = 4;        
        $updatedData->save();
        return redirect()->route('user.getAllMember', $id)->with('success', 'User promoted to member successfully.');
    }

    public function demoteCustomer(Request $request, string $id)
    {
        $updatedData = User::find($id);
        $updatedData->roles_id = 3;        
        $updatedData->save();
        return redirect()->route('user.getAllMember', $id)->with('success', 'User demoted to customer successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = Auth::user();
        $this->authorize('delete-permission', $user);
        try{
            $deletedData = User::find($id);
            $deletedData->delete();
            return redirect()->route('user.index')->with('success', 'Profile deleted successfully.');
        }
        catch(\PDOException $ex){
            $msg = "Failed to delete data! Make sure there is no related data before deleting it";
            return redirect()->route('user.index')->with("status", $msg);
        }
    }

    public function getEditForm(Request $request){
        $id = $request->id;
        $data = User::find($id);
        return response()->json(array(
            'status' =>'oke',
            'msg' => view('users.edituser', compact('data'))->render()
        ), 200);
    }

    public function getAddForm(Request $request){
        return response()->json(array(
            'status' =>'oke',
            'msg' => view('users.addadmin')->render()
        ), 200);
    }
}
