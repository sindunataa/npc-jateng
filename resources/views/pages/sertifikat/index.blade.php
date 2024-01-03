<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sertifikat</title>
    <style>
        @page { margin: 0in; }
        body{
            background-image: url('images/sertifikat.png');
            background-repeat: no-repeat;
            background-size: 100%;
            background-position: center;
            width:100%;
            height:100%;
        }
        h1 {
            font-family: 'Montserrat', sans-serif;                       
            color: rgb(32, 32, 32);
        }
        .container {
        text-align: center;
        margin-top: 300px;
        
        }
        .name {
            font-size: 34px;
            text-transform: uppercase;
        }
        .contingent{
            font-size: 24px;
            margin-top: -10px;
        }
        .medal{
            font-size: 34px;
            text-transform: uppercase;
            margin-top: 38px;
        }
        .matchnum{
            font-size: 24px;
            margin-top: -10px;
        }

        
    </style>
</head>
<body>
{{-- <div class="container">
            <h2 class="name">Sindunata</h2>

            <h2 class="contingent">Yogyakarta</h2>
        
            <h2 class="medal">Gold</h2>

            <h2 class="cabor">Angkat Tangan</h2>
</div> --}}
    <div class="container">
            <h1 class="name">{{$member->name}}</h1>

            <h1 class="contingent">Dari {{$member->contingent->name}}</h1>
            
            @foreach ($member->competition as $item)

            @if ($item->pivot->medal == 'gold')
                <h1 class="medal">Juara 1 {{$member->cabor->name}}
                </h1>
            @elseif ($item->pivot->medal == 'silver')
                <h1 class="medal">Juara 2 ( {{$member->cabor->name}} )
                    
                </h1>
            @elseif ($item->pivot->medal == 'bronze')
                <h1 class="medal">Juara 3 ( {{$member->cabor->name}} )
                </h1>
            @else
                <h1 class="medal">Peserta ( {{$member->cabor->name}} )
                </h1>
            @endif
            @endforeach

            @foreach ($member->competition as $competition)
                <h1 class="matchnum">{{$competition->name}}, {{$competition->type}}</h2>
            @endforeach
        </div>
        
</body>
</html>