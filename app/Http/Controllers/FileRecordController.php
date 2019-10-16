<?php

namespace App\Http\Controllers;

use App\FileRecord;
use Illuminate\Http\Request;

class FileRecordController extends Controller
{

    public function index()
    {
        $fileRecords = FileRecord::where('user_id', 1)->get();
        return response()->json([
            'data' => $fileRecords
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $fileRecord = FileRecord::create([
            'user_id' => 1,
            'filename' => $request->filename,
            'filepath' => $request->filepath[0]['serverId']
        ]);
        return response()->json([
            'data' => $fileRecord,
            'msg' => "file record added",
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\FileRecord  $fileRecord
     * @return \Illuminate\Http\Response
     */
    public function show(FileRecord $fileRecord)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\FileRecord  $fileRecord
     * @return \Illuminate\Http\Response
     */
    public function edit(FileRecord $fileRecord)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\FileRecord  $fileRecord
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, FileRecord $fileRecord)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\FileRecord  $fileRecord
     * @return \Illuminate\Http\Response
     */
    public function destroy(FileRecord $fileRecord)
    {
        $fileRecord->delete();
    }
}
