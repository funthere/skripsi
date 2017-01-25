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
        $project = Project::find($id);
        if ($project) {
            $files = $request->file('file');
            $filenames = $request->filename;
            // dd($files);
            $counter = 0;
            foreach ($files as $file) {
                $filename = $filenames[$counter] . '.' . $file->getClientOriginalExtension();
                $path = $file->storeAs('file/' . $id, $filename); //Will be stored in folder: storage/app/file/{project_id}/filename
                $document = new ProjectDocument;
                $document->project_id = $id;
                $document->user_id = auth()->user()->id;
                $document->file_name = $filename;
                $document->file_path = 'app/' . $path;
                $document->status = "show";
                $result = $document->save();
                if ($result) {
                    return redirect()->route('document.view', ['project_id' => $project->id])->with('status', 'Data successfully uploaded!');
                }
            }
        }
    }

    public function download($id)
    {
         $project = Project::with('userProjects.user')->find($id);
        if ($project) {
        
             $fileName = "/download/doc.doc";
            $file= public_path(). $fileName;
            return view('document.download',['file' => $fileName, 'project' => $project]);
         }
    }

    public function getFile(Request $request)
    {
        // dd($request->get('file_path'));
        $path = $request->get('file_path');
        if ($path) {
            $content = storage_path($path);
            if (!file_exists($content)) {
                return back()->with('error', 'File does not exist!');
            }
            return response()->download($content);
        }
    }
}
