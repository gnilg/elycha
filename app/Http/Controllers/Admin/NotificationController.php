<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Notification;

class NotificationController extends Controller
{
    public function add(Request $request)
    {
        $id = session('id');
        $notifications = Notification::where(['status' => 1])->get();
        if ($request->isMethod('post')) {
            $data = $request->all();
            $title = $data['title'];
            $type = $data['type'];
            $content = $data['content'];

            Notification::create([
                'title' => $title,
                'type' => $type,
                'content' => $content,
                'status' => 1
            ]);
            return redirect()->back()->with('flash_message_success', 'Nouvelle Notification ajoutée avec succès!');
        }
        return view('admin.dashboard.notifications.add', compact('notifications'));
    }
    public function edit(Request $request, $idNotification)
    {
        $id = session('id');
        $notification = Notification::where(['id' => $idNotification])->first();
        if ($request->isMethod('post')) {
            $data = $request->all();
            $title = $data['title'];
            $type = $data['type'];
            $content = $data['content'];

            Notification::where(['id' => $idNotification])->update([
                'title' => $title,
                'type' => $type,
                'content' => $content,
            ]);

            return redirect('/admin/notifications')->with('flash_message_success', 'Notification modifiée avec succès!');
        }
        return view('admin.dashboard.notifications.edit')->with(compact('notification'));
    }
    public function show()
    {
        $id = session('id');
        $notifications = Notification::where(['status' => 1])->get();
        return view('admin.dashboard.notifications.show', compact('notifications'));
    }
    public function delete(Request $request, $idNotification)
    {
        $id = session('id');
        $notification = Notification::where(['id' => $idNotification])->first();
        Notification::where(['id' => $idNotification])->update([
            'status' => 0
        ]);
        return redirect()->back()->with('flash_message_success', 'Notification supprimée avec succès!');
    }
}
