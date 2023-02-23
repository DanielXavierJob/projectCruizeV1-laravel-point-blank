@extends('projectcruize.__construct.construct.sprint')

@section('content')
<main>
<section class="main-club-stuff">    
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h4 class="soccer-h4"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;" style="color: white;">TOP 3</font></font></h4>  
            </div>
        </div>
    </div>           

    <div class="tab-content">
        <div class="tab-pane active" id="managers" role="tabpanel">
            <div id="managers_carousel" class="carousel slide main-stuff-slider" data-ride="carousel">
                <div class="carousel-inner" role="listbox">
                    <div class="item active">
                        <div class="container">
                            <div class="row">
                            <?php $i = 0;?>
                                @foreach($results as $q)
                                <div class="col-md-4">
                                    <div class="staff-item">
                                        <a href="{{  route('profile', $id=$q->player_id) }}">
                                            <span class="info">
                                                <span class="name"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">{{$q->player_name}}</font></font></span>
                                                <span class="position"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">TOP {{$i += 1}}</font></font></span>
                                                <span class="number"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">{{$i}}</font></font></span>
                                            </span>
                                            <img src="images/soccer/player-2.jpg" alt="pessoa-slider">
                                        </a>	
                                    </div>
                                </div>     
                                @endforeach               
                                <script>
                            setInterval(function() {
                                window.location.reload();
                            }, 10000)
                        </script>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>     
    </div>
</section>
</main>
@endsection