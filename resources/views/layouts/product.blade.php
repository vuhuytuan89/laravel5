@extends('layouts.home')
@section('title', 'products')
@section('content')
<?php $name = "<p>tuan</p>"; ?>
{{ $name }}
<br>
{!! $name !!}
<?php $diem = 10 ?>
@if ($diem <= 5)
	học sinh yếu
@elseif ($diem >= 5 && $diem <= 7)
	học sinh tb
@else 
	học sinh giỏi
@endif

	{{ isset($diem) ? $diem : 'Không tồn tại biến điểm' }}
<hr>
	{{ $diem2 or  "Không tồn tại biến điểm" }}
<hr> {{-- for --}}
	@for ($i = 0; $i <= 10; $i++)
		số thứ tự: {{ $i }}
	@endfor
<hr> {{-- while --}}
<?php $i = 0;?>
	@while($i <= 10)
		số thứ tự {{$i}}
		<?php $i++; ?>
	@endwhile
<hr>  {{-- foreach --}}
	<?php $array = ['a', 'b', 'c']; ?>
	@foreach ($array as $item)
		{{ $item }}
	@endforeach
@endsection