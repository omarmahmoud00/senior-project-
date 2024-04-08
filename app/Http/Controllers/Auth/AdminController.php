<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
use App\Http\Requests\Auth\AdminLoginRequest; 
use Illuminate\Http\RedirectResponse;
 
class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Check if the user is authenticated
        if (Auth::guard('is_BusinessUser')->check()) {
            // The user is authenticated, proceed to the admin index view
            return view('admin.index');
        } else {
            // The user is not authenticated, redirect to the login page or any other page
            return   'You must be logged in to access the admin page.';
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       return view('admin.login');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AdminLoginRequest $request)
    {
        if ($request->authenticate()) {
            // Authentication successful
            $request->session()->regenerate();
            return redirect()->intended(RouteServiceProvider::ADMIN);
        }
    
        // Authentication failed
        return redirect()->back()->withErrors(['name' => trans('dashboard/auth.failed')]);
        // If you still need to return 'failed' for any reason (e.g., AJAX call), consider adjusting the response based on the request type.
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
     

    public function destroy(Request $request) : RedirectResponse
    {
        Auth::guard('is_BusinessUser')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();
        return redirect('/admin/login');

    }

}
