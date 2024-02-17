@extends('layouts.master')

@section('content')
<h2 class="text-bold">{{ __("Docker Management Studio") }}</h2>

<ul class="nav nav-tabs" role="tablist" style="margin-bottom: 15px;">
    <li class="nav-item">
        <a class="nav-link active" onclick="dockerStatus()" href="#docker-status" data-toggle="tab">
            <i class="fas fa-server"></i> {{ __("docker-status") }}
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" onclick="getSystemInfo()" href="#systemInfo" data-toggle="tab">
            <i class="fas fa-info"></i> {{ __("Sistem Bilgileri") }}
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" onclick="runScript()" href="#runScript" data-toggle="tab">
            <i class="fab fa-python"></i> {{ __("Python Betiği") }}
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" onclick="taskView()" href="#taskView" data-toggle="tab">
            <i class="fas fa-tasks"></i> {{ __("Task Ekranı") }}
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" onclick="sandbox()" href="#sandbox" data-toggle="tab">
            <i class="fas fa-tasks"></i> {{ __("Sandbox Elemanları") }}
        </a>
    </li>
</ul>

<div class="tab-content">
    <div id="dockerStatus" class="tab-pane active">
        @include('docker-status.main')
    </div>

    <div id="systemInfo" class="tab-pane">
        @include('systeminfo.main')
    </div>

    <div id="runScript" class="tab-pane">
        @include('runscript.main')
    </div>

    <div id="taskView" class="tab-pane">
        @include('taskview.main')
    </div>

    <div id="sandbox" class="tab-pane">
        @include('sandbox.main')
    </div>
</div>
@endsection