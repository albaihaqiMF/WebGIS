@extends('admin.index')

@section('style')
<style>
    .detail {
        display: flex;
        flex-direction: column;
        justify-content: space-around;
        align-items: center;
        height: 200px;
        margin: 20px;
        box-shadow: 0 0 10px 1px black;
        border-radius: 10px;
    }
    .disaster{
        background-color: #336b87;
    }
    .user{
        background-color: #90afc5;
    }

    .detail:hover{
        filter: brightness(110%)
    }

    .detail .head-detail {
        height: auto;
    }

    .img-detail {
        height: 80px;
        border-radius: 10%
    }
    .display-4{
        color: aliceblue
    }
    a.detail{
        text-decoration: none;
    }
</style>
@endsection
@section('content')
<div class="container-fluid">
    This is admin page
    <div class="justify-content-center">
        <div class="row">
            <a href="{{route('admin.disaster')}}" class="col-sm detail disaster">
                <div class="head-detail">
                    <img src="{{asset('image/disaster.png')}}" class="img-detail" alt="">
                </div>
                <div class="detail-text">
                    <h1 class="display-4">{{App\Models\Disaster::count()}} Bencana</h1>
                </div>
            </a>
            <a href="{{route('admin.user')}}" class="col-sm detail user">
                <div class="head-detail">
                    <img src="{{asset('image/group.png')}}" class="img-detail" alt="">
                </div>
                <div class="detail-text">
                    <h1 class="display-4">{{App\Models\User::count()}} Users</h1>
                </div>
            </a>
        </div>
    </div>
</div>
@endsection