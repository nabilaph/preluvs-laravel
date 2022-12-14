@extends('layouts.main')

@section('container')

<div class="wrapper">
    <div class="d-flex justify-content-center align-items-center mb-3 section-margin">
        <h2 class="text-center fw-bolder">{{ auth()->user()->user_name }} 's Notification</h2>
    </div>

    @if(session()->has('success'))
    <div class="alert alert-success" role="alert">
        {{ session('success') }}
    </div>
    @endif
    
    @if(session()->has('deleted'))
    <div class="alert alert-danger" role="alert">
        {{ session('deleted') }}
    </div>
    @endif
    
    <div class="notification_wrap">
        {{-- <div class="notification_icon">
            <i class="fas fa-bell"></i>
        </div> --}}
        @if ($checkout->count())
        @foreach ($checkout as $item)
        @switch($item->status)
        @case('UNPAID')
        <a href="/notification/detail/{{ $item->id }}">
            <div class="notify_item" id="notify_img">
                <div class="notify_img">
                    <img src="/{{ $item->book->book_pict }}" alt="{{ $item->book->book_title }}"
                        style="width: 70px">
                </div>
                <div class="notify_info">
                    <p>Your book has not been paid
                    <p>
                    <div class="notify_desc">
                        <p>Your book is <span>"{{ $item->book->book_title }} " </span></p>
                    </div>
                </div>
            </div>
        </a>
        @break
        @case('PAID')
        <a href="/notification/detail/{{ $item->id }}">
            <div class="notify_item" id="notify_img">
                <div class="notify_img">
                    <img src="/{{ $item->book->book_pict }}" alt="{{ $item->book->book_title }}"
                        style="width: 70px">
                </div>
                <div class="notify_info">
                    <p>Your book has been paid
                    <p>
                    <div class="notify_desc">
                        <p>Your book is <span>"{{ $item->book->book_title }} " </span></p>
                    </div>
                </div>
            </div>
        </a>

        @break
        @case('DELIVERED')
        <a href="/notification/detail/{{ $item->id }}">
            <div class="notify_item" id="notify_img">
                <div class="notify_img">
                    <img src="/{{ $item->book->book_pict }}" alt="{{ $item->book->book_title }}"
                        style="width: 70px">
                </div>
                <div class="notify_info">
                    <p>Your book has been delivered
                    <p>
                    <div class="notify_desc">
                        <p>Your receipt number for Book <span>" {{ $item->book->book_title }} " </span>
                        <p> is {{ $item->receipt_no }} </p>
                    </div>
                </div>
            </div>
        </a>
        @break
        @endswitch
        @endforeach
        @else
        <div class="col text-center w-100">
            <div class="alert alert-secondary text-center" role="alert">Nothing here...</div>
        </div>
        @endif

    </div>
</div>

@endsection