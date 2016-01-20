<html>
    <head>
    <meta charset="UTF-8">
    <title>Bern It Down 2016</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta property="og:image" content="http://localhost/feel-the-bern/images/unelectable.jpg" />
    <meta property="og:description" content="BERNIE SANDERS CAN WIN" />
    <meta property="og:title" content="Bernie Sanders 2016" />
    <!-- Font Awesome -->
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://code.jquery.com/ui/1.12.0-beta.1/themes/smoothness/jquery-ui.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Cambay' rel='stylesheet' type='text/css'>
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">
    
    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

    <!-- jQueryUI -->
    <script src="https://code.jquery.com/ui/1.12.0-beta.1/jquery-ui.min.js"></script>
    
    <!-- Bootstrap JS -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
    <script>
      (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

      ga('create', 'UA-72639111-1', 'auto');
      ga('send', 'pageview');

    </script>
        <style>
                        body {
                    background-color: #fff;
                    margin: 0;
                    padding: 0;
                    width: 98%;
                    display: table;
                    font-weight: 100;
                    font-family: 'Cambay', sans-serif;
                }
        </style>
    </head>
    <body>
    <select class="form-control col-sm-12" id="showState" value="15">
        @foreach(\App\StateList::all() as $state)
            <option value="{{$state->id}}" @if($state->id == 15) selected @endif >{{$state->state_name}}</option>
        @endforeach
    </select>

    <script type="text/javascript">
        $('#showState').on('change', function(){
            $('.states').addClass('hidden');
            $('#show_state_'+$(this).val()).removeClass('hidden');
        });
    </script>
        @foreach(\App\StateList::with('turnout', 'polls')->get() as $state)
        <div class="col-sm-12 states @if($state->id !== 15) hidden @endif" id="show_state_{{$state->id}}">
            <h1>{{$state->state_name}}</h1>
                <div class="col-sm-12 col-md-3 well well-sm">
                    <form action="{{route('turnouts.store')}}" method="post">
                        <input type="hidden" value="{{csrf_token()}}" name="_token">
                        <input type="hidden" value="{{$state->id}}" name="state_id">
                        <center>
                            <h3>Turnout Data ({{$state->state_abbr}})</h4>
                            <div class="col-sm-6">
                                <label>2004</label>
                            </div>
                            <div class="col-sm-6">
                                <input name="turnout_2004" value="{{$state->turnout['turnout_2004']}}">
                            </div>

                            <div class="col-sm-6">
                                <label>2008</label>
                            </div>
                            <div class="col-sm-6">
                                <input name="turnout_2008" value="{{$state->turnout['turnout_2008']}}">
                            </div>
                            <div class="col-sm-12">&nbsp</div>
                            <div class="col-sm-12">
                                <button type="submit" class="btn btn-primary pull-right">Update</button>
                            </div>
                        </center>
                    </form>
                </div>
                <div class="col-sm-12 col-md-9 well well-sm">
                            <table class="table">
                                <th>
                                    2004<br>
                                    {{$state->estimateVotes('undecided', '2004')}} Undecided<br>
                                    <span class="btn btn-xs btn-warning">Clinton {{$state->estimateUndecidedVotes('clinton', '2004')}}</span>
                                    <span class="btn btn-xs btn-success">Sanders {{$state->estimateUndecidedVotes('sanders', '2004')}}</span>
                                    <br>
                                 </th>
                                <th>2008<br>
                                    {{$state->estimateVotes('undecided', '2008')}} Undecided<br>
                                    <span class="btn btn-xs btn-warning">Clinton {{$state->estimateUndecidedVotes('clinton', '2008')}}</span>
                                    <span class="btn btn-xs btn-success">Sanders {{$state->estimateUndecidedVotes('sanders', '2008')}}</span>
                                </th>
                                <th>2016<br>
                                    {{$state->estimateVotes('undecided', '2016')}} Undecided<br>
                                    <span class="btn btn-xs btn-warning">Clinton {{$state->estimateUndecidedVotes('clinton', '2016')}}</span>
                                    <span class="btn btn-xs btn-success">Sanders {{$state->estimateUndecidedVotes('sanders', '2016')}}</span>
                                </th>
                                <th>Total Difference<br>
                                </th>
                                <tr>
                                <td>
                                    Clinton {{$state->estimateVotes('clinton', '2004')}}<br>                    
                                    Sanders {{$state->estimateVotes('sanders', '2004')}}<br>                
                                </td>
                                <td>
                                    Clinton {{$state->estimateVotes('clinton', '2008')}}<br>                     
                                    Sanders {{$state->estimateVotes('sanders', '2008')}}<br>                                      
                                </td>
                                <td>
                                    Clinton {{$state->estimateVotes('clinton', '2016')}}<br>                     
                                    Sanders {{$state->estimateVotes('sanders', '2016')}}<br>  
                                </td>
                                <td>
                                    <span class="btn btn-xs btn-warning">Clinton {{$state->estimateVictory('clinton', 'sanders')}}</span><br>
                                    <span class="btn btn-xs btn-success">Sanders {{$state->estimateVictory('sanders', 'clinton')}}</span>                  
                                </td>
                            </table>
                    <h3>Local Polling Data ({{$state->state_abbr}})
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#add_poll_{{$state->id}}">
                          Add Poll <i class="fa fa-plus"></i>
                        </button>
                        <div class="col-sm-12">
                        </div>
                    </h3>
                    <!-- Button trigger modal -->
                        <table class="table">
                            <tbody class="table-striped">
                                <th>Poll Name</th>
                                <th>Poll Start</th>
                                <th>Poll End</th>
                                <th>Sample</th>
                                <th>MoE</th>
                                <th>Clinton</th>
                                <th>Sanders</th>
                                <th>O'Malley</th><tr>
                    @foreach($state->polls as $poll)
                            <form action="{{route('updatepoll')}}" method="post">
                                <input type="hidden" value="{{csrf_token()}}" name="_token">
                                <input type="hidden" value="{{$state->id}}" name="state_id">
                                <input type="hidden" value="{{$poll->id}}" name="poll_id">
                                <td>
                                    <a class="btn btn-warning btn-xs" href="{{route('destroypoll', $poll->id)}}" method="post"><span><i class="fa fa-trash"></i></span></a>
                                    <input style="max-width:100px;" name="poll_name" value="{{$poll->poll_name}}">
                                </td>
                                <td><input style="max-width:100px;" name="poll_start_date" value="{{Carbon::parse($poll->poll_start_date)->format('m/d/Y')}}" class="datepicker"></td>
                                <td><input style="max-width:100px;" name="poll_end_date" value="{{Carbon::parse($poll->poll_end_date)->format('m/d/Y')}}" class="datepicker"></td>
                                <td><input style="max-width:100px;" name="sample" value="{{$poll->sample}}"></td>
                                <td><input style="max-width:100px;" name="moe" value="{{$poll->moe}}"></td>
                                <td><input style="max-width:100px;" name="clinton" value="{{$poll->clinton}}"></td>
                                <td><input style="max-width:100px;" name="sanders" value="{{$poll->sanders}}"></td>
                                <td><input style="max-width:100px;" name="omalley" value="{{$poll->omalley}}"></td>
                                <td><button class="btn btn-sm" type="submit">Update</button></td><tr>
                            </tbody>
                            </form>

                    @endforeach
                        <td colspan="5"></td>
                        <td>{{$state->candidateAvg('clinton')}}%</td>
                        <td>{{$state->candidateAvg('sanders')}}%</td>
                        <td>{{$state->candidateAvg('omalley')}}%</td>
                        </table>

                        <table class="table" style="background:#fff">
                            <tbody>

                            </tbody>
                        </table>

                    <!-- Modal -->
                    <div class="modal fade" id="add_poll_{{$state->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalLabel">Add a New Poll to {{$state->state_abbr}}</h4>
                          </div>
                          <div class="modal-body">
                            <form action="{{route('polls.store')}}" method="post">
                                <input type="hidden" value="{{csrf_token()}}" name="_token">
                                <input type="hidden" value="{{$state->id}}" name="state_id">
                                <div class="col-sm-12">
                                    <label>Poll Name</label>
                                </div>
                                <div class="col-sm-12">
                                    <input name="poll_name">
                                </div>
                                <div class="col-sm-12">
                                    <label>Poll Start</label>
                                </div>
                                <div class="col-sm-12">
                                    <input name="poll_start_date" class="datepicker">
                                </div>
                                <div class="col-sm-12">
                                    <label>Poll End</label>
                                </div>
                                <div class="col-sm-12">
                                    <input name="poll_end_date" class="datepicker">
                                </div>
                                <div class="col-sm-12">
                                    <label>Sample</label>
                                </div>
                                <div class="col-sm-12">
                                    <input name="sample">
                                </div>
                                <div class="col-sm-12">
                                    <label>MoE</label>
                                </div>
                                <div class="col-sm-12">
                                    <input name="moe">
                                </div>
                                <div class="col-sm-12">
                                    <label>Clinton</label>
                                </div>
                                <div class="col-sm-12">
                                    <input name="clinton">
                                </div>
                                <div class="col-sm-12">
                                    <label>Sanders</label>
                                </div>
                                <div class="col-sm-12">
                                    <input name="sanders">
                                </div>
                                <div class="col-sm-12">
                                    <label>O'Malley</label>
                                </div>
                                <div class="col-sm-12">
                                    <input name="omalley">
                                </div>
                          </div>
                          <div class="modal-footer" style="border:0px;">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </form>
                          </div>
                        </div>
                      </div>
                    </div>
                </div>
            </div>
        @endforeach
        <script type="text/javascript">
              $(function() {
                $( ".datepicker" ).datepicker();
              });
        </script>
    </body>
</html>
