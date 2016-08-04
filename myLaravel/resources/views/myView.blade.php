@extends("layouts.main")

{{--單行section不需結尾，直接於第2個參數設定值--}}
@section("title","標題列")

@section("sidebar")
    <h2>這是子視圖的側邊欄</h2>
    {{--以show結尾的section不需要yield引入，直接會顯示內容--}}
@show

@section("content_1")
    <h2>測試子視圖的內容: {{$paraFromRoute1 . $paraFromRoute2}}</h2>
    目前的日期:{{date("Y-M-D")}}
@endsection

@include("parts.partTest")