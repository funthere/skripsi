<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;
use App\User;
use App\UserProject;
use Illuminate\Support\Facades\Auth;
use View, Redirect;
use Response;

class ProjectDocumentController extends BaseController
{
	 public function upload($id)
    {
        $project = Project::with('userProjects.user')->find($id);
        if ($project) {
        return view('document.upload', ['project' => $project]);
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
}