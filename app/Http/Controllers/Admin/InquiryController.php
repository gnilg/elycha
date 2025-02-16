<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Inquiry;
use Illuminate\Http\Request;

class InquiryController extends Controller
{
    public function show()
    {
        $id = session('id');
        $inquiries = Inquiry::where(['status' => 1])->orderBy('id', 'DESC')->get();
        return view('admin.dashboard.inquiries.show', compact('inquiries'));
    }
}
