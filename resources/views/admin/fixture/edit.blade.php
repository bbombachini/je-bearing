<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>J/E Bearings | Edit Fixture</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 24px;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">

            <div class="content">
                <div class="title m-b-md">
                    <!-- <h1></h1> -->
                    <h1>Edit Fixture</h1>
                    {!! Form::model($old, ['action' => 'FixtureController@update']) !!}
                      @foreach ($old as $object)
                        {{ Form::hidden('id', $object->fixture_id) }}
                        {!! Form::label('name', 'Name') !!}
                        {!! Form::text('name', $object->fixture_name, ['class' => 'form-control']) !!}
                        {!! Form::label('number', 'Number') !!}
                        {!! Form::text('number', $object->fixture_number, ['class' => 'form-control']) !!}
                        {!! Form::label('desc', 'Description') !!}
                        {!! Form::text('desc', $object->fixture_desc, ['class' => 'form-control', 'size' =>'30x5']) !!}
                      @endforeach
                      <button type="submit" name="button">CLICK</button>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </body>
</html>
