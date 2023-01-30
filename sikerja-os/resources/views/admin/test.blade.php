<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>jQuery Show Hide Elements Using Radio Buttons</title>
    <style>
        .box {
            color: #fff;
            padding: 20px;
            display: none;
            margin-top: 20px;
        }

        .red {
            background: #ff0000;
        }

        .green {
            background: #228B22;
        }

        .blue {
            background: #0000ff;
        }
    </style>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    {{-- <script>
        $(document).ready(function() {
            $('input[type="radio"]').click(function() {
                var inputValue = $(this).attr("value");
                var targetBox = $("." + inputValue);
                $(".box").not(targetBox).hide();
                $(targetBox).show();
            });
        });
    </script> --}}
    <script>
        $(document).ready(function() {
            $('input[type="radio"]').click(function() {
                // var radioValue = $(this).val();
                // alert(radioValue);
                var inputValue = $(this).attr("value");
                var targetBox = $("." + inputValue);
                $(".box").not(targetBox).hide();
                $(targetBox).show();
            });
        })
    </script>

    <script>
        function showHide(id) {
            $("#" + id).toggle();
        }
    </script>
</head>

<body>
    <div>
        @foreach ($user as $u)
            {{-- <label><input type="radio" name="radio" value="{{ $u->id }}"> --}}
            <button class="btn btn btn-primary" data-id="{{ $u->id }}"
                onclick="showHide('replycomment-{{ $u->id }}');">
                <span class="fa fa-reply"></span>
            </button>
            {{ $u->name }}</label>
        @endforeach
        <label><input type="radio" name="radio" value="red"> red</label>
        <label><input type="radio" name="radio" value="green"> green</label>
        <label><input type="radio" name="radio" value="blue"> blue</label>
    </div>
    @foreach ($user as $u)
        <div class="{{ $u->id }} box">
            @if ($kinerja === $u->id)
                {{ $hitung }}
                <strong>red radio button</strong> {{ $belum }}
            @endif
        </div>
    @endforeach
    <div class="red box">You have selected <strong>red radio button</strong> so i am here</div>
    <div class="green box">You have selected <strong>green radio button</strong> so i am here</div>
    <div class="blue box">You have selected <strong>blue radio button</strong> so i am here</div>
</body>

</html>
