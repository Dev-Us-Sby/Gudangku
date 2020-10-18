<div class="breadcrumb-item">
  @if ($active)
    <a href="{{ $link }}">{{ $text }}</a>
  @else
    {{ $text }}
  @endif
</div>