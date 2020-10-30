@extends('layouts.global')

@section('content')
<div class="white-box box-widget">
    <div class="row justify-content-center">
        <div class="col-md-8 p-8">
            <div class="card">
                <div class="xx-large" style="font-size: 20px;">{{ ('Welcome ') }}{{ Auth::user()->name }}{{(',')}}

                
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in Zua Collection!') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


            
