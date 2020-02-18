<div class="col-md-3 left-sidebar">
            <div class="card">
                <div class="card-header">Quick Links</div>

                @if(Auth::check())
                   <ul>
                     <li>
                       <a href="{{ url('/profile') }}/{{Auth::user()->slug}}">
                          <img src="{{Config::get('app.url')}}/fb.com/public/image/{{Auth::user()->avatar}}"
                       width="32" style="margin:5px"  />
                       {{Auth::user()->name}}</a>
                     </li>
                     <li>
                       <a href="{{url('/')}}"> <img src="{{Config::get('app.url')}}/fb.com/public/image/news_feed.png"
                       width="32" style="margin:5px"  />
                       News Feed</a>
                     </li>
                     <li>
                       <a href="{{url('/friends')}}"> <img src="{{Config::get('app.url')}}/fb.com/public/image/friend.png"
                       width="32" style="margin:5px"  />
                       Friends </a>
                     </li>
                     <li>
                       <a href="{{url('/messages')}}"> <img src="{{Config::get('app.url')}}/fb.com/public/image/msg_icon.png"
                       width="32" style="margin:5px"  />
                      Messages</a>
                     </li>

                     <li>
                       <a href="{{url('/findFriends')}}"> <img src="{{Config::get('app.url')}}/fb.com/public/image/findFriends.png"
                       width="32" style="margin:5px"  />
                      Find Friends</a>
                     </li>

                    
                   </ul>
                   @endif
            </div>
        </div>