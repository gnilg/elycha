<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Video;

class VideoController extends Controller
{
    public function add(Request $request)
    {
        $id = session('id');
        if ($request->isMethod('post')) {
            $data = $request->all();
            $primary = "";
                if ($request->hasfile('video')) {
                    $imageIcon = $request->file('video');
                    $exten = $imageIcon->getClientOriginalExtension();
                    $imageIconName = getRamdomText(10) . uniqid() . '.' . $exten;
                    $destinationPath = myPublicPath('/videos');
                    $ulpoadImageSuccess = $imageIcon->move($destinationPath, $imageIconName);
                    $primary = "/videos/" . $imageIconName;
                }

            Video::create([
                    'url' => $primary,
                    'status' => 1
                ]);
                return redirect()->back()->with('flash_message_success', 'Nouvelle Vidéo ajoutée avec succès!');
        }
        return view('admin.dashboard.videos.add', compact('videos'));
    }
    public function edit(Request $request, $idVideo)
    {
        $id = session('id');
        $video = Video::where(['id' => $idVideo])->first();
        if ($request->isMethod('post')) {
            $data = $request->all();
            $primary = $video->url;
                if ($request->hasfile('video')) {
                    $imageIcon = $request->file('video');
                    $exten = $imageIcon->getClientOriginalExtension();
                    $imageIconName = getRamdomText(10) . uniqid() . '.' . $exten;
                    $destinationPath = myPublicPath('/videos');
                    $ulpoadImageSuccess = $imageIcon->move($destinationPath, $imageIconName);
                    $primary = "/videos/" . $imageIconName;
                }

            Video::where(['id' => $idVideo])->update([
                'url' => $primary,
            ]);

            return redirect('/admin/videos')->with('flash_message_success', 'Vidéo modifiée avec succès!');
        }
        return view('admin.dashboard.videos.edit')->with(compact('video'));
    }
    public function show()
    {
        $id = session('id');
        $videos = Video::where(['status' => 1])->get();
        return view('admin.dashboard.videos.show', compact('videos'));
    }
    public function delete(Request $request, $idVideo)
    {
        $id = session('id');
        $video = Video::where(['id' => $idVideo])->first();
        Video::where(['id' => $idVideo])->update([
            'status' => 0
        ]);
        return redirect()->back()->with('flash_message_success', 'Vidéo supprimée avec succès!');
    }
}
