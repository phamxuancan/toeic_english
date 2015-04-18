@extends('layouts.index')
<script src="<?php echo URL::to('/') ?>/bootstrap/js/jquery-1.11.2.min.js"></script>
 <script type="text/javascript"src="<?php echo URL::to('/') ?>/voice/record.js"></script>
 <script type="text/javascript"src="<?php echo URL::to('/') ?>/voice/recorder.js"></script>
 <script type="text/javascript"src="<?php echo URL::to('/') ?>/voice/recorderWorker.js"></script>
@section('content')
    <div class="col-lg-12">
        <audio controls src="" id="audio"></audio>
            <div style="margin:10px;">
                <a class="btn btn-default btn-danger" id="record">Record</a>
                <a class="btn btn-default btn-danger" id="stop">Reset</a>
                <a class="btn btn-default btn-danger" id="play">Play</a>
                <a class="btn btn-default btn-danger" id="download">Download</a>
            </div>
    </div>
@endsection