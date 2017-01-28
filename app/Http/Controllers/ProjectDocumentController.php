<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;
use App\ProjectDocument;
use Illuminate\Support\Facades\Auth;
use View, Redirect;
use Response;
use Illuminate\Support\Facades\Storage;

class ProjectDocumentController extends BaseController
{
	public function upload($id)
    {
        $project = Project::with('documents')->find($id);
        if ($project) {
            // dd($project->documents);
            return view('document.upload', ['project' => $project]);
        }
    }
    public function uploadSave($id, Request $request)
    {
        // dd($request->all());
        $project = Project::find($id);
        if ($project) {
            $files = $request->file('file');
            $filenames = $request->filename;
            // dd($files);
            $counter = 0;
            $uploadSuccess = false;

            // Pengecekan apkah ada file dengan nama yang sama
            $same = false;
            // foreach ($files as $key => $file) {
            // }
            // if ($same == true) {
            //     // return back()->withInput()->with('error', "File name with the same extension can't be uploaded!");
            // } else {

                foreach ($files as $key => $file) {
                    $filename = 'file/' . $id . '/' . $filenames[$key] . '.' . $file->getClientOriginalExtension();
                    // dd($filename);
                    // $document = new ProjectDocument;
                    // dd(Storage::exists($filename));
                    // if (Storage::exists($filename)) {
                    //     $same = true;
                    // }
                    // if ($same == true) {
                        $document = ProjectDocument::where('file_path', $filename)->first();
                    // }
                    if (!$document) {
                        $document = new ProjectDocument;
                    }
                    
                    
                    $filename = $filenames[$key] . '.' . $file->getClientOriginalExtension();
                     //Will be stored in folder: storage/app/file/{project_id}/filename
                    $path = $file->storeAs('file/' . $id, $filename);
                    $document->project_id = $project->id;
                    $document->user_id = auth()->user()->id;
                    $document->file_name = $filename;
                    $document->file_path = $path;
                    $document->status = "show";
                    $result = $document->save();
                    if ($result) {
                        $uploadSuccess = true;
                    }
                    $counter++;
                }
                if ($uploadSuccess) {
                    return redirect()->route('document.view', ['project_id' => $project->id])->with('status', 'Data successfully uploaded!');
                }
            // }
        }
    }

    public function download($id)
    {
        $project = Project::with('documents.owner')->find($id);
        // dd($project->documents);
        if ($project) {
            return view('document.download', ['project' => $project]);
        }
    }

    public function getFile(Request $request)
    {
        // dd($request->get('file_path'));
        $path = $request->get('file_path');
        $folder = 'app/';
        if ($path) {
            $content = storage_path($folder . $path);
            // dd(($content));
            if (!Storage::exists($path)) {
                return back()->with('error', 'File does not exist!');
            }
            return response()->download($content);
        }
        return back()->with('error', 'File does not exist!');
    }

    public function deleteFile($id)
    {
        // dd(Storage::exists('file/1/ok1.doc'));
        $document = ProjectDocument::find($id);
        if ($document) {
            $filePath = $document->file_path;
            $deleted = $document->delete();
            if ($deleted) {
                $fileExist = Storage::exists($document->file_path);
                if ($fileExist) { //Jika file ada, maka delete file
                    Storage::delete($filePath);
                }

                return back()->with('status', 'Delete data success!');

            } else {
                return back()->with('error', 'Something wrong when delete data!');
            }
        } else {
            return back()->with('error', 'Data not found!');
        }
    }
}
