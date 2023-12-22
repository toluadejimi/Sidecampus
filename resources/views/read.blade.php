@extends('main.read')
@section('content')

<div id="content-page" class="content-page">

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    @if (session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
    @endif
    @if (session()->has('error'))
    <div class="alert alert-danger">
        {{ session()->get('error') }}
    </div>
    @endif


    <style>
        /*style for overall progress bar */
        progress {
            /*reset to default appearance*/
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;

            width: 200px;
            height: 20px;
            border-radius: 20px;
            border: 1px solid #434343;
        }

        /*style for background track*/
        progress::-webkit-progress-bar {
            background: rgb(221, 221, 221);
            box-shadow: 0 2px 3px rgba(0, 0, 0, 0.2) inset;
            border-radius: 20px;
        }

        /*style for progress track*/
        progress::-webkit-progress-value {
            background-image: linear-gradient(120deg, #05045d 0, #007acc 55%);
            border-radius: 20px;
        }
    </style>






    <div class="container-fluid">
        
        <div id="pdf-viewer"></div>

    <script>
        var pdfUrl = 'path/to/your/pdf/document.pdf';
    </script>

    <script src="path/to/your/pdf-viewer-script.js"></script>


        <iframe  oncontextmenu="return false" src="{{ $book_pdf }}#toolbar=0" width="100%" height="800px"></iframe>
        
    </div>

    <script>

        document.addEventListener('contextmenu', function(e) {
            e.preventDefault();
        });


    </script>
</div>

@endsection
