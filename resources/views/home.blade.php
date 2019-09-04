@extends('layouts.app')

@section('content')
<div class="dash_container_out">
    <div class="dash_container_inner">
        <dash-menu></dash-menu>
        <div class="dash_info_container_out">
            <router-view>
                <content-component></content-component>
            </router-view>
        </div>
    </div>
</div>
@endsection
