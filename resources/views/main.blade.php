@extends('layouts.master')
@section('content')

    <button class="got">
        bind button
    </button> <br>

    <button class="reg">
        reg
    </button> <br>

    <button class="unReg">
        un reg
    </button> <br>

    <div  id="app"></div>

    @if(Sentinel::check())
        {{--        Manager     administrator  		 --}}
        @if(Sentinel::inRole('Manager'))
            <div>
                333333333333333344444444444444444
            </div>
        @endif
        @if(Sentinel::inRole('administrator'))
            <div>
                555555555555555566666666666666666
            </div>
        @endif
    @endif

@stop

@section('styles')
    <style>

    </style>
@stop

@section('scripts')
    <script src="{{ asset('js/app.js') }}"></script>
    <script>

        _token = '{{csrf_token()}}';
        //alert('dddddddd')



        $('.reg').bind('click', function (){

            $.post('{{ route('reg') }}',
                {_token: _token, email: 'admin@admin.com', password: 'admin'},
                res=>{
                    console.log('ok');
                    if(res.status === 'success'){
                        console.log('ok1');
                        location.reload();
                    }else{
                        console.log('ok_error');
                    }
            })
        })


        $('.unReg').bind('click', function (){

            $.post('{{ route('unReg') }}',
                {_token: _token},
                res=>{
                    console.log('ok');
                    if(res.status === 'success'){
                        console.log('ok1');
                        location.reload();
                    }else{
                        console.log('ok_error');
                    }
                })
        })

    </script>
@stop
