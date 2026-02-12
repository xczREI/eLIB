<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Member;

class ScanController extends Controller
{
    public function index()
{
    return view('scan-member');
}

    public function scanMember(Request $request) {
        $qrCode = $request->input('qr_code');
        $member = Member::where('qr_code', $qrCode)->first();

        if (!$member) {
            return back()->with('error', 'Member not found!');
        }

        return back()->with('success', 'Member: ' . $member->name);
    }


}
