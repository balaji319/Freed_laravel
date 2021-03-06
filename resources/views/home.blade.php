@extends('layouts.app')

@section('content')
 
  <div class="container-fluid">
              <!-- Collect the nav links, forms, and other content for toggling -->
              <div class="collapse navbar-collapse collapsed_nav" id="subnav">
                <ul class="nav navbar-nav " style="margin-top: -12px;">
                  <li class="active"><a href="index.html"><i class="fa fa-fw icon-ship-wheel"></i> Timeline</a></li>
                  <li><a href="user-public-profile.html"><i class="fa fa-fw icon-user-1"></i> About</a></li>
                  <li><a href="user-public-users.html"><i class="fa fa-fw fa-users"></i> Friends</a></li>
                </ul>
                <ul class="nav navbar-nav hidden-xs navbar-right " style="margin-top: -12px;">
                  <li><a href="#" data-toggle="chat-box">Chat <i class="fa fa-fw fa-comment-o"></i></a></li>
                </ul>
              </div>
              <!-- /.navbar-collapse -->
            </div>

          </nav>         
           <div class="cover overlay cover-image-full height-300-lg">
            <img src="{{url('../')}}/coverpics/{{Auth::user()->coverpic}}" alt="cover"  style="height: 105%;"/>
            <div class="overlay overlay-full">
              <div class="v-top">
                   <i class="fa fa-pencil pencil_div" data-toggle="modal" data-target="#cover_myModal"></i>                
                <!-- <input type="file" @change="onfilechange" style="position:absolute;left: 0;top: 0; opacity: 0" />  -->
              </div>
            </div>
         </div>
 
    <!-- Upload Cover Picture Model  -->
         <div class="modal fade" id="cover_myModal" role="dialog">
              <div class="modal-dialog  modal-lg">
                <!-- Modal content-->
                  <div class="modal-content">
                      <div class="modal-header user_model">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Upload Cover Picture</h4>
                      </div>
                      <div class="modal-body ">
                           <form action="{{url('upload/cover')}}" method="post" enctype="multipart/form-data">
                              {{ csrf_field() }}
                              <div style="position: relative;display: inline-block;">
                                 <div class="upload_img">
                                   <span class="glyphicon glyphicon-upload span_div" ></span><b> Cover photo upload</b><br><br>
                                   <input type="file" name="coverpic" style="position:absolute;left: 0;top: 0; opacity: 0" required>  
                                   <button type="submit" class="btn btn-danger">Upload</button>
                                 </div>          
                              </div>
                           </form> 
                          <hr>
                          <div >
                             <div class="col-md-6">
                              <img src="{{url('../')}}/coverpics/{{Auth::user()->coverpic}}" alt="cover"   style="width:74%;margin-top: 17px"/>
                        
                                   <h4 class="text-center" style="margin-left: -131px;"><b>Old Image</b></h4>
                             </div>
                          </div>                                     
                      </div>
                      <div class="modal-footer" style="background-color: white; height: 55px;">
                          <button type="button" class="btn btn-info" data-dismiss="modal">Close</button>
                      </div>
                  </div>             
              </div>
        </div>
        <!--End Profile  Modal -->
 <!--End  Upload Cover Picture Model  -->



      <div class="collapse navbar-collapse" id="subnav" >
                <ul class="nav navbar-nav ">
                  <li><a href="user-private-timeline.html"><i class="fa fa-fw icon-ship-wheel"></i> My Timeline</a></li>
                </ul>
                <ul class="nav navbar-nav  navbar-right ">
                  <li><a href="login.html"> Logout<i class="fa fa-fw fa-sign-out"></i></a></li>
                </ul>
              </div>
              <!-- /.navbar-collapse -->

            </div>
          </nav>

   <div class="timeline row" data-toggle="isotope">      
              <div class="col-xs-12 col-md-6 col-lg-3 item">
                <div class="timeline-block">
                  <div class="panel panel-default relative">
                    <img src="{{asset('web/images/place2-full.jpg')}}" alt="place" class="img-responsive">
                    <div class="panel-body panel-boxed text-center">
                      <div class="rating">
                        <span class="star"></span>
                        <span class="star filled"></span>
                        <span class="star filled"></span>
                        <span class="star filled"></span>
                        <span class="star filled"></span>
                      </div>
                    </div>
                    <div class="panel-body">
                      <img src="{{asset('web/images/people/50/guy-2.jpg')}}" alt="people" class="img-circle" />
                      <img src="{{asset('web/images/people/50/woman-2.jpg')}}" alt="people" class="img-circle" />
                      <img src="{{asset('web/images/people/50/guy-3.jpg')}}" alt="people" class="img-circle" />
                      <img src="{{asset('web/images/people/50/woman-3.jpg')}}" alt="people" class="img-circle" />
                      <a href="#" class="user-count-circle">12+</a>
                    </div>
                  </div>

                </div>
              </div>
                <div class="col-xs-12 col-md-6 col-lg-6 item">
                <div class="timeline-block">
                  <div class="panel panel-default share clearfix-xs">
                    <div class="panel-heading panel-heading-gray title" style=" padding: 0px;">
                     <!--  What&acute;s new -->  <img src="{{url('../')}}/images/{{Auth::user()->image}}"
                   style="width:56px; margin:5px; padding:5px" class="img-circle">@{{post}}
                    </div>
                    <div class="panel-body">
                        <div v-if="!image">
                              <form method="post" enctype="multipart/form-data" v-on:submit.prevent="addpost">  
                                    <textarea v-model="content" name="status" class="form-control share-text" placeholder="What's On Your Mind..."></textarea>
                                    <button type="submit" class="btn btn-sm btn-info pull-right" style="margin:10px" id="postBtn">Post</button>                                             
                              </form>
                       </div> 
                       <div v-else>
                            <div class="upload_remove_img">
                               <textarea v-model="content" name="status" class="form-control share-text" placeholder="What's On Your Mind..." cols="100"></textarea><br><br>
                                <b @click="removeImg" class="remove_img">X</b>  
                                 <img :src="image" style="width: 108px; height:81px; margin-top:-26px;"/>                         
                            </div>
                              <button @click="uploadImg" class="btn btn-sm btn-info pull-right" style="margin:10px">Post</button> 
                       </div>
                      <!-- <textarea name="status" class="form-control share-text" placeholder="What's On Your Mind..."></textarea> -->
                    </div>
                    <div class="panel-footer share-buttons">
                      <a href="#"><i class="fa fa-map-marker"></i></a>
                      <div style="position: relative;display: inline-block;">
                         <div style="cursor: pointer;">     
                            <a><i class="fa fa-photo" style="font-size: 19px;"></i></a>
                            <input type="file" @change="onfilechange" style="position:absolute;left: 0;top: 0; opacity: 0" /> 
                         </div>
                      </div>
                      <a href="#"><i class="fa fa-video-camera"></i></a>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-xs-12 col-md-6 col-lg-3 item">
                <div class="timeline-block">
                  <div class="panel panel-default">

                    <div class="panel-heading">
                      <div class="media">
                        <div class="media-left">
                          <a href="">
                            <img src="{{asset('web/images/people/50/woman-6.jpg')}}" class="media-object">
                          </a>
                        </div>
                        <div class="media-body">
                          <a href="#" class="pull-right text-muted"><i class="icon-reply-all-fill fa fa-2x "></i></a>

                          <a href="">TYRTYRTYTR</a>

                          <span>on 15th January, 2014</span>
                        </div>
                      </div>
                    </div>

                    <div class="panel-body">
                      <p>Late Night Show Photos</p>
                      <div class="timeline-added-images">
                        <img src="{{asset('web/images/social/100/1.jpg')}}" width="80" alt="photo" />
                        <img src="{{asset('web/images/social/100/2.jpg')}}" width="80" alt="photo" />
                        <img src="{{asset('web/images/social/100/3.jpg')}}" width="80" alt="photo" />
                      </div>
                    </div>
                    <div class="view-all-comments">
                      <a href="#">
                        <i class="fa fa-comments-o"></i> View all
                      </a>
                      <span>10 comments</span>

                    </div>
                    <ul class="comments">
                      <li class="media">
                        <div class="media-left">
                          <a href="">
                            <img src="{{asset('web/images/people/50/guy-5.jpg')}}" class="media-object">
                          </a>
                        </div>
                        <div class="media-body">
                          <div class="pull-right dropdown" data-show-hover="li">
                            <a href="#" data-toggle="dropdown" class="toggle-button">
                              <i class="fa fa-pencil"></i>
                            </a>
                            <ul class="dropdown-menu" role="menu">
                              <li><a href="#">Edit</a></li>
                              <li><a href="#">Delete</a></li>
                            </ul>
                          </div>
                          <a href="" class="comment-author pull-left">Bill D.</a>
                          <span>Hi Mary, Nice Party</span>
                          <div class="comment-date">21st September</div>
                        </div>
                      </li>
                      <li class="media">
                        <div class="media-left">
                          <a href="">
                            <img src="{{asset('web/images/people/50/woman-5.jpg')}}" class="media-object">
                          </a>
                        </div>
                        <div class="media-body">
                          <div class="pull-right dropdown" data-show-hover="li">
                            <a href="#" data-toggle="dropdown" class="toggle-button">
                              <i class="fa fa-pencil"></i>
                            </a>
                            <ul class="dropdown-menu" role="menu">
                              <li><a href="#">Edit</a></li>
                              <li><a href="#">Delete</a></li>
                            </ul>
                          </div>
                          <a href="" class="comment-author pull-left">Mary</a>
                          <span>Thanks Bill</span>
                          <div class="comment-date">2 days</div>
                        </div>
                      </li>
                      <li class="media">
                        <div class="media-left">
                          <a href="">
                            <img src="{{asset('web/images/people/50/guy-5.jpg')}}" class="media-object">
                          </a>
                        </div>
                        <div class="media-body">
                          <div class="pull-right dropdown" data-show-hover="li">
                            <a href="#" data-toggle="dropdown" class="toggle-button">
                              <i class="fa fa-pencil"></i>
                            </a>
                            <ul class="dropdown-menu" role="menu">
                              <li><a href="#">Edit</a></li>
                              <li><a href="#">Delete</a></li>
                            </ul>
                          </div>
                          <a href="" class="comment-author pull-left">Bill D.</a>
                          <span>What time did it finish?</span>
                          <div class="comment-date">14 min</div>
                        </div>
                      </li>
                      <li class="comment-form">
                        <div class="input-group">

                          <span class="input-group-btn">
                             <a href="" class="btn btn-default"><i class="fa fa-photo"></i></a>
                          </span>

                          <input type="text" class="form-control" />

                        </div>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
              <div class="col-xs-12 col-md-6 col-lg-3 item">
                <div class="timeline-block">
                  <div class="panel panel-default">

                    <div class="panel-heading">
                      <div class="media">
                        <div class="media-left">
                          <a href="">
                            <img src="{{asset('web/images/people/50/guy-6.jpg')}}" class="media-object">
                          </a>
                        </div>
                        <div class="media-body">
                          <a href="#" class="pull-right text-muted"><i class="icon-reply-all-fill fa fa-2x "></i></a>

                          <a href="">Jonathan</a>

                          <span>on 15th January, 2014</span>
                        </div>
                      </div>
                    </div>

                    <img src="{{ asset('web/images/place1-full.jpg') }}" class="img-responsive">
                    <ul class="comments">
                      <li clas="media">
                        <div class="media-left">
                          <a href="">
                            <img src=" {{ asset('web/images/people/50/woman-5.jpg') }}" class="media-object">
                          </a>
                        </div>
                        <div class="media-body">
                          <div class="pull-right dropdown" data-show-hover="li">
                            <a href="#" data-toggle="dropdown" class="toggle-button">
                              <i class="fa fa-pencil"></i>
                            </a>
                            <ul class="dropdown-menu" role="menu">
                              <li><a href="#">Edit</a></li>
                              <li><a href="#">Delete</a></li>
                            </ul>
                          </div>
                          <a href="" class="comment-author">Mary</a>
                          <span>Wow</span>
                          <div class="comment-date">2 days</div>
                        </div>
                      </li>
                      <li class="comment-form">
                        <div class="input-group">
                          <input type="text" class="form-control" />
                          <span class="input-group-btn">
                             <a href="" class="btn btn-default"><i class="fa fa-photo"></i></a>
                          </span>
                        </div>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>

              <div class="col-xs-12 col-md-6 col-lg-6 item" style="margin-top: -10%;" >
                <div class="timeline-block" v-for="post,key in posts">
                  <div class="panel panel-default">
                    <div class="panel-heading">
                      <div class="media">
                        <div class="media-left">
                          <a href="">
                         <img :src="'{{url('../')}}/images/'+post.user.image"  class="media-object" style=" height: 50px; width: 68px;"> 
                          </a>
                        </div>
                        <div class="media-body">
                         <div  v-if="post.user_id == '{{Auth::user()->id}}'" style="cursor: pointer;">
                           <span @click="deletepost(post.id)" class="pull-right">Delete</span>                           
                         </div>
                          <a href="">@{{post.user.firstname}}</a>
                          <span>@{{post.created_at | myTime }}</span>
                        </div>
                      </div>
                    </div>
                    <div class="panel-body text-muted">
                      <i class="fa fa-map-marker"></i> Was in <a href="#">Brooklyn, New York</a>
                    </div>
                    <div class="relative height-300" style="height: 373px !important;">
                      <div data-toggle="google-maps" class="maps-google-fs" data-center="40.776928,-73.910330" data-zoom="12" data-style="paper">
                        <span>@{{post.content}}</span><br>
                         <img v-if="post.postImage" :src="'{{url('../')}}/postImages/'+post.postImage" heigth="50px"  alt="" title="" class="img-thumbnail post_img">
                      </div>
                    </div>
                    
                      <div class="view-all-comments">
                         <!-- Likes Section -->
                            <span v-if="post.like.length!=0" @click="LikePost(post.id)" >
                              <span v-if="post.user_id == '{{Auth::user()->id}}'" >
                                <b style="cursor:pointer;color:#26a69a"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i>Your Like</b>
                                <b style="color: black"> @{{post.like.length}}</b></b>
                              </span>
                              <span v-else style="cursor: pointer;">
                                 <b class="text-info">Likes </b> <b style="color: black"> @{{post.like.length}}</b></b>
                              </span>
                            </span>
                            <span v-else  @click="LikePost(post.id)">
                                 <b style="cursor:pointer;color:black"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i> Like</b>
                            </span>
                         <!-- End Likes Section --> 
                        <a href="#">
                          <i class="fa fa-comments-o"></i> View all
                        </a>
                        <a  @click="commentSeen=!commentSeen" class="pull-right" style="cursor: pointer;">@{{post.comment.length}} Comments</a>
                      </div>
                    <ul class="comments" >
                      <li class="media"  v-for="comment in post.comment">
                        <div class="media-left">
                          <a href="">

                              <img v-if="post.user.image" :src="'{{url('../')}}/images/'+post.user.image"   alt="" title="" style="width: 52px;height: 52px;">
                          
                          </a>
                        </div>
                        <div class="media-body">
                          <div class="pull-right dropdown" data-show-hover="li">
                            <span data-toggle="dropdown" class="toggle-button">
                              <i class="fa fa-pencil"></i>
                            </span>
                            <div>
                                <span style="display:none"><span>Show Comment</span>
                            </div>
                            <ul class="dropdown-menu" role="menu" >
                              <span  v-if="comment.user_id == '{{Auth::user()->id}}'">
                                   <li><a href="#">Edit</a></li>
                                   <li><a href="#"  @click="deletecomment(comment.id)" >Delete</a></li>
                              </span>
                              <span v-else>
                                 <li id="hide_comment"><span >Hide/Show</span></li>
                              </span>
                            </ul>
                          </div>
                          <div id="hide_div">
                          <a href="" class="comment-author pull-left">@{{post.user.firstname}}</a><br>
                          <span>@{{comment.comment}}</span>
                          <div class="comment-date">@{{comment.created_at | myTime }}</div>
                        </div>
                        </div>
                      </li>
                   
                     
                      <p class="comment-form" >
                          <div class="input-group" v-if="commentSeen">
                              <span class="input-group-btn">
                                 <button class="btn btn-success" @click="sendComment(post,key)">Send</button>  
                              </span>
                              <input type="text"  v-model="commentadd[key]"  class="form-control">
                          </div>
                      </p>
                    </ul>
                  </div>
                </div>
              </div>

              <div class="col-xs-12 col-md-6 col-lg-3 item">
                <div class="timeline-block">
                  <div class="panel panel-default">
                    <div class="panel-heading">
                      <div class="media">
                        <div class="media-left">
                          <a href="">
                            <img src="{{ asset('web/images/people/50/guy-5.jpg') }}" class="media-object">
                          </a>
                        </div>
                        <div class="media-body">
                          <a href="#" class="pull-right text-muted"><i class="icon-reply-all-fill fa fa-2x "></i></a>
                          <a href="">Jonathan</a>
                          <span>on 15th January, 2014</span>
                        </div>
                      </div>
                    </div>
                    <div class="panel-body">
                      Amazing 3D Animation
                    </div>
                    <!-- 4:3 aspect ratio -->
                    <div class="embed-responsive embed-responsive-4by3">
                      <iframe class="embed-responsive-item" src="//player.vimeo.com/video/50522981?title=0&amp;byline=0&amp;portrait=0&amp;color=ffffff"></iframe>
                    </div>
                    <div class="view-all-comments"><i class="fa fa-comments-o"></i> Be the first to comment</div>
                    <ul class="comments">
                      <li class="comment-form">
                        <div class="input-group">
                          <input type="text" class="form-control" />
                          <span class="input-group-btn">
                             <a href="" class="btn btn-default"><i class="fa fa-photo"></i></a>
                          </span>
                        </div>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
              <div class="col-xs-12 col-md-6 col-lg-4 item">
                <div class="timeline-block">
                  <div class="panel panel-default">
                    <div class="panel-heading">
                      <div class="media">
                        <div class="media-left">
                          <a href="">
                            <img src=" {{ asset('web/images/people/50/woman-4.jpg') }} " class="media-object">
                          </a>
                        </div>
                        <div class="media-body">
                          <a href="#" class="pull-right text-muted"><i class="icon-reply-all-fill fa fa-2x "></i></a>
                          <a href="">Michelle</a>
                          <span>on 15th January, 2014</span>
                        </div>
                      </div>
                    </div>
                    <div class="weather-svg">
                      <div class="list">
                        <div class="list-item">
                          <div class="text-h6">Today</div>
                          <svg version="1.1" id="cloudDrizzleSunFill" class="climacon climacon_cloudDrizzleSunFill" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="15 15 70 70" enable-background="new 15 15 70 70" xml:space="preserve">
                            <g class="climacon_iconWrap climacon_iconWrap-cloudDrizzleSunFill">
                              <g class="climacon_componentWrap climacon_componentWrap-sun climacon_componentWrap-sun_cloud">
                                <g class="climacon_componentWrap climacon_componentWrap_sunSpoke">
                                  <path class="climacon_component climacon_component-stroke climacon_component-stroke_sunSpoke climacon_component-stroke_sunSpoke-north" d="M80.029,43.611h-3.998c-1.105,0-2-0.896-2-1.999s0.895-2,2-2h3.998c1.104,0,2,0.896,2,2S81.135,43.611,80.029,43.611z"
                                  />
                                  <path class="climacon_component climacon_component-stroke climacon_component-stroke_sunSpoke climacon_component-stroke_sunSpoke-north" d="M72.174,30.3c-0.781,0.781-2.049,0.781-2.828,0c-0.781-0.781-0.781-2.047,0-2.828l2.828-2.828c0.779-0.781,2.047-0.781,2.828,0c0.779,0.781,0.779,2.047,0,2.828L72.174,30.3z"
                                  />
                                  <path class="climacon_component climacon_component-stroke climacon_component-stroke_sunSpoke climacon_component-stroke_sunSpoke-north" d="M58.033,25.614c-1.105,0-2-0.896-2-2v-3.999c0-1.104,0.895-2,2-2c1.104,0,2,0.896,2,2v3.999C60.033,24.718,59.135,25.614,58.033,25.614z"
                                  />
                                  <path class="climacon_component climacon_component-stroke climacon_component-stroke_sunSpoke climacon_component-stroke_sunSpoke-north" d="M43.892,30.3l-2.827-2.828c-0.781-0.781-0.781-2.047,0-2.828c0.78-0.781,2.047-0.781,2.827,0l2.827,2.828c0.781,0.781,0.781,2.047,0,2.828C45.939,31.081,44.673,31.081,43.892,30.3z"
                                  />
                                  <path class="climacon_component climacon_component-stroke climacon_component-stroke_sunSpoke climacon_component-stroke_sunSpoke-north" d="M42.033,41.612c0,1.104-0.896,1.999-2,1.999h-4c-1.104,0-1.998-0.896-1.998-1.999s0.896-2,1.998-2h4C41.139,39.612,42.033,40.509,42.033,41.612z"
                                  />
                                  <path class="climacon_component climacon_component-stroke climacon_component-stroke_sunSpoke climacon_component-stroke_sunSpoke-north" d="M43.892,52.925c0.781-0.78,2.048-0.78,2.827,0c0.781,0.78,0.781,2.047,0,2.828l-2.827,2.827c-0.78,0.781-2.047,0.781-2.827,0c-0.781-0.78-0.781-2.047,0-2.827L43.892,52.925z"
                                  />
                                  <path class="climacon_component climacon_component-stroke climacon_component-stroke_sunSpoke climacon_component-stroke_sunSpoke-north" d="M58.033,57.61c1.104,0,2,0.895,2,1.999v4c0,1.104-0.896,2-2,2c-1.105,0-2-0.896-2-2v-4C56.033,58.505,56.928,57.61,58.033,57.61z"
                                  />
                                  <path class="climacon_component climacon_component-stroke climacon_component-stroke_sunSpoke climacon_component-stroke_sunSpoke-north" d="M72.174,52.925l2.828,2.828c0.779,0.78,0.779,2.047,0,2.827c-0.781,0.781-2.049,0.781-2.828,0l-2.828-2.827c-0.781-0.781-0.781-2.048,0-2.828C70.125,52.144,71.391,52.144,72.174,52.925z"
                                  />
                                </g>
                                <g class="climacon_componentWrap climacon_componentWrap-sunBody">
                                  <circle class="climacon_component climacon_component-stroke climacon_component-stroke_sunBody" cx="58.033" cy="41.612" r="11.999" />
                                  <circle class="climacon_component climacon_component-fill climacon_component-fill_sunBody" fill="#FFFFFF" cx="58.033" cy="41.612" r="7.999" />
                                </g>
                              </g>
                              <g class="climacon_componentWrap climacon_componentWrap-drizzle">
                                <path class="climacon_component climacon_component-stroke climacon_component-stroke_drizzle climacon_component-stroke_drizzle-left" d="M42.001,53.644c1.104,0,2,0.896,2,2v3.998c0,1.105-0.896,2-2,2c-1.105,0-2.001-0.895-2.001-2v-3.998C40,54.538,40.896,53.644,42.001,53.644z"
                                />
                                <path class="climacon_component climacon_component-stroke climacon_component-stroke_drizzle climacon_component-stroke_drizzle-middle" d="M49.999,53.644c1.104,0,2,0.896,2,2v4c0,1.104-0.896,2-2,2s-1.998-0.896-1.998-2v-4C48.001,54.54,48.896,53.644,49.999,53.644z"
                                />
                                <path class="climacon_component climacon_component-stroke climacon_component-stroke_drizzle climacon_component-stroke_drizzle-right" d="M57.999,53.644c1.104,0,2,0.896,2,2v3.998c0,1.105-0.896,2-2,2c-1.105,0-2-0.895-2-2v-3.998C55.999,54.538,56.894,53.644,57.999,53.644z"
                                />
                              </g>

                              <g class="climacon_componentWrap climacon_componentWrap_cloud">
                                <path class="climacon_component climacon_component-stroke climacon_component-stroke_cloud" d="M43.945,65.639c-8.835,0-15.998-7.162-15.998-15.998c0-8.836,7.163-15.998,15.998-15.998c6.004,0,11.229,3.312,13.965,8.203c0.664-0.113,1.338-0.205,2.033-0.205c6.627,0,11.998,5.373,11.998,12c0,6.625-5.371,11.998-11.998,11.998C57.168,65.639,47.143,65.639,43.945,65.639z"
                                />
                                <path class="climacon_component climacon_component-fill climacon_component-fill_cloud" fill="#FFFFFF" d="M59.943,61.639c4.418,0,8-3.582,8-7.998c0-4.417-3.582-8-8-8c-1.601,0-3.082,0.481-4.334,1.291c-1.23-5.316-5.973-9.29-11.665-9.29c-6.626,0-11.998,5.372-11.998,11.999c0,6.626,5.372,11.998,11.998,11.998C47.562,61.639,56.924,61.639,59.943,61.639z"
                                />
                              </g>
                            </g>
                          </svg>
                          <!-- cloudDrizzleSunFill -->
                        </div>
                        <div class="list-item">
                          <div class="text-h6">Tomorrow</div>
                          <svg version="1.1" id="sun" class="climacon climacon_sun" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="15 15 70 70" enable-background="new 15 15 70 70" xml:space="preserve">
                            <clipPath id="svgs/sunFillClip">
                              <path d="M0,0v100h100V0H0z M50.001,57.999c-4.417,0-8-3.582-8-7.999c0-4.418,3.582-7.999,8-7.999s7.998,3.581,7.998,7.999C57.999,54.417,54.418,57.999,50.001,57.999z" />
                            </clipPath>
                            <g class="climacon_iconWrap climacon_iconWrap-sun">
                              <g class="climacon_componentWrap climacon_componentWrap-sun">
                                <g class="climacon_componentWrap climacon_componentWrap-sunSpoke">
                                  <path class="climacon_component climacon_component-stroke climacon_component-stroke_sunSpoke climacon_component-stroke_sunSpoke-east" d="M72.03,51.999h-3.998c-1.105,0-2-0.896-2-1.999s0.895-2,2-2h3.998c1.104,0,2,0.896,2,2S73.136,51.999,72.03,51.999z" />
                                  <path class="climacon_component climacon_component-stroke climacon_component-stroke_sunSpoke climacon_component-stroke_sunSpoke-northEast" d="M64.175,38.688c-0.781,0.781-2.049,0.781-2.828,0c-0.781-0.781-0.781-2.047,0-2.828l2.828-2.828c0.779-0.781,2.047-0.781,2.828,0c0.779,0.781,0.779,2.047,0,2.828L64.175,38.688z"
                                  />
                                  <path class="climacon_component climacon_component-stroke climacon_component-stroke_sunSpoke climacon_component-stroke_sunSpoke-north" d="M50.034,34.002c-1.105,0-2-0.896-2-2v-3.999c0-1.104,0.895-2,2-2c1.104,0,2,0.896,2,2v3.999C52.034,33.106,51.136,34.002,50.034,34.002z"
                                  />
                                  <path class="climacon_component climacon_component-stroke climacon_component-stroke_sunSpoke climacon_component-stroke_sunSpoke-northWest" d="M35.893,38.688l-2.827-2.828c-0.781-0.781-0.781-2.047,0-2.828c0.78-0.781,2.047-0.781,2.827,0l2.827,2.828c0.781,0.781,0.781,2.047,0,2.828C37.94,39.469,36.674,39.469,35.893,38.688z"
                                  />
                                  <path class="climacon_component climacon_component-stroke climacon_component-stroke_sunSpoke climacon_component-stroke_sunSpoke-west" d="M34.034,50c0,1.104-0.896,1.999-2,1.999h-4c-1.104,0-1.998-0.896-1.998-1.999s0.896-2,1.998-2h4C33.14,48,34.034,48.896,34.034,50z"
                                  />
                                  <path class="climacon_component climacon_component-stroke climacon_component-stroke_sunSpoke climacon_component-stroke_sunSpoke-southWest" d="M35.893,61.312c0.781-0.78,2.048-0.78,2.827,0c0.781,0.78,0.781,2.047,0,2.828l-2.827,2.827c-0.78,0.781-2.047,0.781-2.827,0c-0.781-0.78-0.781-2.047,0-2.827L35.893,61.312z"
                                  />
                                  <path class="climacon_component climacon_component-stroke climacon_component-stroke_sunSpoke climacon_component-stroke_sunSpoke-south" d="M50.034,65.998c1.104,0,2,0.895,2,1.999v4c0,1.104-0.896,2-2,2c-1.105,0-2-0.896-2-2v-4C48.034,66.893,48.929,65.998,50.034,65.998z"
                                  />
                                  <path class="climacon_component climacon_component-stroke climacon_component-stroke_sunSpoke climacon_component-stroke_sunSpoke-southEast" d="M64.175,61.312l2.828,2.828c0.779,0.78,0.779,2.047,0,2.827c-0.781,0.781-2.049,0.781-2.828,0l-2.828-2.827c-0.781-0.781-0.781-2.048,0-2.828C62.126,60.531,63.392,60.531,64.175,61.312z"
                                  />
                                </g>
                                <g class="climacon_componentWrap climacon_componentWrap_sunBody" clip-path="url(#sunFillClip)">
                                  <circle class="climacon_component climacon_component-stroke climacon_component-stroke_sunBody" cx="50.034" cy="50" r="11.999" />
                                </g>
                              </g>
                            </g>
                          </svg>
                          <!-- sun -->
                        </div>
                        <div class="list-item">
                          <div class="text-h6">Saturday</div>
                          <svg version="1.1" id="cloudRainFill" class="climacon climacon_cloudRainFill" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="15 15 70 70" enable-background="new 15 15 70 70" xml:space="preserve">
                            <g class="climacon_iconWrap climacon_iconWrap-cloudRainFill">
                              <g class="climacon_componentWrap climacon_componentWrap-rain">
                                <path class="climacon_component climacon_component-stroke climacon_component-stroke_rain climacon_component-stroke_rain- left" d="M41.946,53.641c1.104,0,1.999,0.896,1.999,2v15.998c0,1.105-0.895,2-1.999,2s-2-0.895-2-2V55.641C39.946,54.537,40.842,53.641,41.946,53.641z"
                                />
                                <path class="climacon_component climacon_component-stroke climacon_component-stroke_rain climacon_component-stroke_rain- middle" d="M49.945,57.641c1.104,0,2,0.896,2,2v15.998c0,1.104-0.896,2-2,2s-2-0.896-2-2V59.641C47.945,58.535,48.841,57.641,49.945,57.641z"
                                />
                                <path class="climacon_component climacon_component-stroke climacon_component-stroke_rain climacon_component-stroke_rain- right" d="M57.943,53.641c1.104,0,2,0.896,2,2v15.998c0,1.105-0.896,2-2,2c-1.104,0-2-0.895-2-2V55.641C55.943,54.537,56.84,53.641,57.943,53.641z"
                                />
                                <path class="climacon_component climacon_component-stroke climacon_component-stroke_rain climacon_component-stroke_rain- left" d="M41.946,53.641c1.104,0,1.999,0.896,1.999,2v15.998c0,1.105-0.895,2-1.999,2s-2-0.895-2-2V55.641C39.946,54.537,40.842,53.641,41.946,53.641z"
                                />
                                <path class="climacon_component climacon_component-stroke climacon_component-stroke_rain climacon_component-stroke_rain- middle" d="M49.945,57.641c1.104,0,2,0.896,2,2v15.998c0,1.104-0.896,2-2,2s-2-0.896-2-2V59.641C47.945,58.535,48.841,57.641,49.945,57.641z"
                                />
                                <path class="climacon_component climacon_component-stroke climacon_component-stroke_rain climacon_component-stroke_rain- right" d="M57.943,53.641c1.104,0,2,0.896,2,2v15.998c0,1.105-0.896,2-2,2c-1.104,0-2-0.895-2-2V55.641C55.943,54.537,56.84,53.641,57.943,53.641z"
                                />
                              </g>
                              <g class="climacon_componentWrap climacon_componentWrap_cloud">
                                <path class="climacon_component climacon_component-stroke climacon_component-stroke_cloud" d="M43.945,65.639c-8.835,0-15.998-7.162-15.998-15.998c0-8.836,7.163-15.998,15.998-15.998c6.004,0,11.229,3.312,13.965,8.203c0.664-0.113,1.338-0.205,2.033-0.205c6.627,0,11.998,5.373,11.998,12c0,6.625-5.371,11.998-11.998,11.998C57.168,65.639,47.143,65.639,43.945,65.639z"
                                />
                                <path class="climacon_component climacon_component-fill climacon_component-fill_cloud" fill="#FFFFFF" d="M59.943,61.639c4.418,0,8-3.582,8-7.998c0-4.417-3.582-8-8-8c-1.601,0-3.082,0.481-4.334,1.291c-1.23-5.316-5.973-9.29-11.665-9.29c-6.626,0-11.998,5.372-11.998,11.999c0,6.626,5.372,11.998,11.998,11.998C47.562,61.639,56.924,61.639,59.943,61.639z"
                                />
                              </g>
                            </g>
                          </svg>
                          <!-- cloudRainFill -->
                        </div>
                      </div>
                      <hr class="margin-none" />
                      <div class="today text-center">
                        <svg version="1.1" id="cloudDrizzleSunFill" class="climacon climacon_cloudDrizzleSunFill" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="15 15 70 70" enable-background="new 15 15 70 70" xml:space="preserve">
                          <g class="climacon_iconWrap climacon_iconWrap-cloudDrizzleSunFill">
                            <g class="climacon_componentWrap climacon_componentWrap-sun climacon_componentWrap-sun_cloud">
                              <g class="climacon_componentWrap climacon_componentWrap_sunSpoke">
                                <path class="climacon_component climacon_component-stroke climacon_component-stroke_sunSpoke climacon_component-stroke_sunSpoke-north" d="M80.029,43.611h-3.998c-1.105,0-2-0.896-2-1.999s0.895-2,2-2h3.998c1.104,0,2,0.896,2,2S81.135,43.611,80.029,43.611z"
                                />
                                <path class="climacon_component climacon_component-stroke climacon_component-stroke_sunSpoke climacon_component-stroke_sunSpoke-north" d="M72.174,30.3c-0.781,0.781-2.049,0.781-2.828,0c-0.781-0.781-0.781-2.047,0-2.828l2.828-2.828c0.779-0.781,2.047-0.781,2.828,0c0.779,0.781,0.779,2.047,0,2.828L72.174,30.3z"
                                />
                                <path class="climacon_component climacon_component-stroke climacon_component-stroke_sunSpoke climacon_component-stroke_sunSpoke-north" d="M58.033,25.614c-1.105,0-2-0.896-2-2v-3.999c0-1.104,0.895-2,2-2c1.104,0,2,0.896,2,2v3.999C60.033,24.718,59.135,25.614,58.033,25.614z"
                                />
                                <path class="climacon_component climacon_component-stroke climacon_component-stroke_sunSpoke climacon_component-stroke_sunSpoke-north" d="M43.892,30.3l-2.827-2.828c-0.781-0.781-0.781-2.047,0-2.828c0.78-0.781,2.047-0.781,2.827,0l2.827,2.828c0.781,0.781,0.781,2.047,0,2.828C45.939,31.081,44.673,31.081,43.892,30.3z"
                                />
                                <path class="climacon_component climacon_component-stroke climacon_component-stroke_sunSpoke climacon_component-stroke_sunSpoke-north" d="M42.033,41.612c0,1.104-0.896,1.999-2,1.999h-4c-1.104,0-1.998-0.896-1.998-1.999s0.896-2,1.998-2h4C41.139,39.612,42.033,40.509,42.033,41.612z"
                                />
                                <path class="climacon_component climacon_component-stroke climacon_component-stroke_sunSpoke climacon_component-stroke_sunSpoke-north" d="M43.892,52.925c0.781-0.78,2.048-0.78,2.827,0c0.781,0.78,0.781,2.047,0,2.828l-2.827,2.827c-0.78,0.781-2.047,0.781-2.827,0c-0.781-0.78-0.781-2.047,0-2.827L43.892,52.925z"
                                />
                                <path class="climacon_component climacon_component-stroke climacon_component-stroke_sunSpoke climacon_component-stroke_sunSpoke-north" d="M58.033,57.61c1.104,0,2,0.895,2,1.999v4c0,1.104-0.896,2-2,2c-1.105,0-2-0.896-2-2v-4C56.033,58.505,56.928,57.61,58.033,57.61z"
                                />
                                <path class="climacon_component climacon_component-stroke climacon_component-stroke_sunSpoke climacon_component-stroke_sunSpoke-north" d="M72.174,52.925l2.828,2.828c0.779,0.78,0.779,2.047,0,2.827c-0.781,0.781-2.049,0.781-2.828,0l-2.828-2.827c-0.781-0.781-0.781-2.048,0-2.828C70.125,52.144,71.391,52.144,72.174,52.925z"
                                />
                              </g>
                              <g class="climacon_componentWrap climacon_componentWrap-sunBody">
                                <circle class="climacon_component climacon_component-stroke climacon_component-stroke_sunBody" cx="58.033" cy="41.612" r="11.999" />
                                <circle class="climacon_component climacon_component-fill climacon_component-fill_sunBody" fill="#FFFFFF" cx="58.033" cy="41.612" r="7.999" />
                              </g>
                            </g>
                            <g class="climacon_componentWrap climacon_componentWrap-drizzle">
                              <path class="climacon_component climacon_component-stroke climacon_component-stroke_drizzle climacon_component-stroke_drizzle-left" d="M42.001,53.644c1.104,0,2,0.896,2,2v3.998c0,1.105-0.896,2-2,2c-1.105,0-2.001-0.895-2.001-2v-3.998C40,54.538,40.896,53.644,42.001,53.644z"
                              />
                              <path class="climacon_component climacon_component-stroke climacon_component-stroke_drizzle climacon_component-stroke_drizzle-middle" d="M49.999,53.644c1.104,0,2,0.896,2,2v4c0,1.104-0.896,2-2,2s-1.998-0.896-1.998-2v-4C48.001,54.54,48.896,53.644,49.999,53.644z"
                              />
                              <path class="climacon_component climacon_component-stroke climacon_component-stroke_drizzle climacon_component-stroke_drizzle-right" d="M57.999,53.644c1.104,0,2,0.896,2,2v3.998c0,1.105-0.896,2-2,2c-1.105,0-2-0.895-2-2v-3.998C55.999,54.538,56.894,53.644,57.999,53.644z"
                              />
                            </g>

                            <g class="climacon_componentWrap climacon_componentWrap_cloud">
                              <path class="climacon_component climacon_component-stroke climacon_component-stroke_cloud" d="M43.945,65.639c-8.835,0-15.998-7.162-15.998-15.998c0-8.836,7.163-15.998,15.998-15.998c6.004,0,11.229,3.312,13.965,8.203c0.664-0.113,1.338-0.205,2.033-0.205c6.627,0,11.998,5.373,11.998,12c0,6.625-5.371,11.998-11.998,11.998C57.168,65.639,47.143,65.639,43.945,65.639z"
                              />
                              <path class="climacon_component climacon_component-fill climacon_component-fill_cloud" fill="#FFFFFF" d="M59.943,61.639c4.418,0,8-3.582,8-7.998c0-4.417-3.582-8-8-8c-1.601,0-3.082,0.481-4.334,1.291c-1.23-5.316-5.973-9.29-11.665-9.29c-6.626,0-11.998,5.372-11.998,11.999c0,6.626,5.372,11.998,11.998,11.998C47.562,61.639,56.924,61.639,59.943,61.639z"
                              />
                            </g>
                          </g>
                        </svg>
                        <!-- cloudDrizzleSunFill -->
                        <div class="clearfix"></div>
                        <div class="details">
                          Today
                          <strong class="pull-right"> 10&deg; C </strong>
                        </div>
                      </div>
                    </div>
                    <div class="view-all-comments"><i class="fa fa-comments-o"></i> Be the first to comment</div>
                    <ul class="comments">
                      <li class="comment-form">
                        <div class="input-group">
                         <input type="text" class="form-control" />
                         <span class="input-group-btn">
                             <a href="" class="btn btn-default"><i class="fa fa-photo"></i></a>
                          </span>
                        </div>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>

              <div class="col-xs-12 col-md-6 col-lg-4 item">
                <div class="timeline-block">
                  <div class="panel panel-default">
                    <div class="profile-block">
                      <div class="cover overlay cover-image-full">
                        <img src="{{ asset('web/images/people/50/woman-4.jpg') }}  " alt="cover">
                        <div class="overlay overlay-full overlay-bg-black">
                          <div class="v-top v-spacing-2">
                            <a href="#" class="icon pull-right">
                              <i class="fa fa-comment"></i>
                            </a>
                            <div class="text-headline text-overlay">Adrian Demian</div>
                            <p class="text-overlay">User Interface Designer</p>
                          </div>
                          <div class="v-bottom">
                            <a href="#">
                              <img src=" {{ asset('web/images/people/110/guy-6.jpg') }} " alt="people" class="img-circle avatar" />
                            </a>
                          </div>
                        </div>
                      </div>

                      <div class="profile-icons">
                        <span><i class="fa fa-users"></i> 372</span> <span><i class="fa fa-photo"></i> 43</span>
                        <span><i class="fa fa-video-camera"></i> 3 </span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-xs-12 col-md-6 col-lg-4 item">
                <div class="timeline-block">
                  <div class="panel panel-default event">
                    <div class="panel-heading title">
                      Cocktail Party
                    </div>
                    <ul class="icon-list icon-list-block">
                      <li><i class="fa fa-globe"></i> Miami, FL</li>
                      <li><i class="fa fa-calendar-o"></i> 31st Oct 2014</li>
                      <li><i class="fa fa-clock-o"></i> 5:50 PM</li>
                      <li><i class="fa fa-users"></i> 9 Attendees <a href="#" class="btn btn-primary btn-stroke btn-xs pull-right">Attend</a></li>
                    </ul>
                    <ul class="img-grid">
                      <li>
                        <a href="#">
                          <img src=" {{ asset('web/images/people/110/guy-6.jpg') }} " alt="people" class="img-responsive" />
                        </a>
                      </li>
                      <li>
                        <a href="#">
                          <img src=" {{ asset('web/images/people/110/woman-3.jpg') }}" alt="people" class="img-responsive" />
                        </a>
                      </li>
                      <li>
                        <a href="#">
                          <img src=" {{ asset('web/images/people/110/guy-2.jpg') }}" alt="people" class="img-responsive" />
                        </a>
                      </li>
                      <li>
                        <a href="#">
                          <img src=" {{ asset('web/images/people/110/guy-9.jpg') }}" alt="people" class="img-responsive" />
                        </a>
                      </li>
                      <li>
                        <a href="#">
                          <img src=" {{ asset('web/images/people/110/woman-9.jpg') }}" alt="people" class="img-responsive" />
                        </a>
                      </li>
                      <li class="clearfix">
                        <a href="#">
                          <img src=" {{ asset('web/images/people/110/guy-4.jpg') }}" alt="people" class="img-responsive" />
                        </a>
                      </li>
                      <li>
                        <a href="#">
                          <img src=" {{ asset('web/images/people/110/guy-1.jpg') }}" alt="people" class="img-responsive" />
                        </a>
                      </li>
                      <li>
                        <a href="#">
                          <img src=" {{ asset('web/images/people/110/woman-4.jpg') }}" alt="people" class="img-responsive" />
                        </a>
                      </li>
                      <li>
                        <a href="#">
                          <img src=" {{ asset('web/images/people/110/guy-6.jpg') }}" alt="people" class="img-responsive" />
                        </a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                </div>
              </div>
              <div class="col-xs-12 col-md-6 col-lg-4 item">
                <div class="timeline-block">
                  <div class="panel panel-default profile-card clearfix-xs">
                    <div class="panel-body">
                      <div class="profile-card-icon">
                        <i class="fa fa-graduation-cap"></i>
                      </div>
                      <h4 class="text-center">Graduation Badge</h4>
                      <ul class="icon-list icon-list-block">
                        <li><i class="fa fa-map-marker"></i> Amsterdam, Europe</li>
                        <li><i class="fa fa-trophy"></i> 1st in Class</li>
                        <li><i class="fa fa-calendar"></i> 31st Oct 2014</li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-xs-12 col-md-6 col-lg-4 item">
                <div class="timeline-block">
                  <div class="panel panel-default">

                    <div class="panel-heading">
                      <div class="media">
                        <div class="media-left">
                          <a href="">
                            <img src="{{asset('web/images/people/50/guy-2.jpg')}}" class="media-object">
                          </a>
                        </div>
                        <div class="media-body">
                          <a href="#" class="pull-right text-muted"><i class="icon-reply-all-fill fa fa-2x "></i></a>
                          <a href="">Jonathan</a>
                          <span>on 15th January, 2014</span>
                        </div>
                      </div>
                    </div>
                    <div class="panel-body">
                      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad blanditiis perspiciatis praesentium quaerat repudiandae soluta? Cum doloribus esse et eum facilis impedit officiis omnis optio, placeat, quia quo reprehenderit sunt velit?
                        Asperiores cumque deserunt eveniet hic reprehenderit sit, ut voluptatum?</p>
                    </div>
                    <div class="view-all-comments">
                      <a href="#">
                        <i class="fa fa-comments-o"></i> View all
                      </a>
                      <span>10 comments</span>
                    </div>
                    <ul class="comments">
                      <li class="media">
                        <div class="media-left">
                          <a href="">
                            <img src="{{asset('web/images/people/50/guy-5.jpg')}}" class="media-object">
                          </a>
                        </div>
                        <div class="media-body">
                          <div class="pull-right dropdown" data-show-hover="li">
                            <a href="#" data-toggle="dropdown" class="toggle-button">
                              <i class="fa fa-pencil"></i>
                            </a>
                            <ul class="dropdown-menu" role="menu">
                              <li><a href="#">Edit</a></li>
                              <li><a href="#">Delete</a></li>
                            </ul>
                          </div>
                          <a href="" class="comment-author pull-left">Bill D.</a>
                          <span>Hi Mary, Nice Party</span>
                          <div class="comment-date">21st September</div>
                        </div>
                      </li>
                      <li class="media">
                        <div class="media-left">
                          <a href="">
                            <img src="{{asset('web/images/people/50/woman-5.jpg')}}" class="media-object">
                          </a>
                        </div>
                        <div class="media-body">
                          <div class="pull-right dropdown" data-show-hover="li">
                            <a href="#" data-toggle="dropdown" class="toggle-button">
                              <i class="fa fa-pencil"></i>
                            </a>
                            <ul class="dropdown-menu" role="menu">
                              <li><a href="#">Edit</a></li>
                              <li><a href="#">Delete</a></li>
                            </ul>
                          </div>
                          <a href="" class="comment-author pull-left">Mary</a>
                          <span>Thanks Bill</span>
                          <div class="comment-date">2 days</div>
                        </div>
                      </li>
                      <li class="media">
                        <div class="media-left">
                          <a href="">
                            <img src="{{asset('web/images/people/50/guy-5.jpg')}}" class="media-object">
                          </a>
                        </div>
                        <div class="media-body">
                          <div class="pull-right dropdown" data-show-hover="li">
                            <a href="#" data-toggle="dropdown" class="toggle-button">
                              <i class="fa fa-pencil"></i>
                            </a>
                            <ul class="dropdown-menu" role="menu">
                              <li><a href="#">Edit</a></li>
                              <li><a href="#">Delete</a></li>
                            </ul>
                          </div>
                          <a href="" class="comment-author pull-left">Bill D.</a>
                          <span>What time did it finish?</span>
                          <div class="comment-date">14 min</div>
                        </div>
                      </li>
                      <li class="comment-form">
                        <div class="input-group">
                          <span class="input-group-btn">
                             <a href="" class="btn btn-default"><i class="fa fa-photo"></i></a>
                          </span>
                          <input type="text" class="form-control" />
                        </div>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>

              <div class="col-xs-12 col-md-6 col-lg-4 item">
                <div class="timeline-block">
                  <div class="panel panel-default">

                    <div class="panel-heading">
                      <div class="media">
                        <div class="media-left">
                          <a href="">
                            <img src="{{asset('web/images/people/50/woman-5.jpg')}}" class="media-object">
                          </a>
                        </div>
                        <div class="media-body">
                          <a href="#" class="pull-right text-muted"><i class="icon-reply-all-fill fa fa-2x "></i></a>
                          <a href="">Michelle</a>
                          <span>on 15th January, 2014</span>
                        </div>
                      </div>
                    </div>
                    <div class="panel-body">
                      <div class="boxed">
                        <a href="#" class="h4 margin-none">Vegetarian Pizza</a>
                        <div>
                          <span class="fa fa-star text-primary"></span>
                          <span class="fa fa-star text-primary"></span>
                          <span class="fa fa-star text-primary"></span>
                          <span class="fa fa-star text-primary"></span>
                          <span class="fa fa-star-o"></span>
                        </div>
                        <div class="media">
                          <div class="media-left">
                            <a href="#">
                              <img src="{{asset('web/images/food1.jpg')}}" alt="" width="80" class="media-object">
                            </a>
                          </div>
                          <div class="media-body">
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolor impedit ipsum laborum maiores tempore veritatis....</p>
                          </div>
                        </div>
                        <ul class="icon-list">
                          <li><i class="fa fa-star fa-fw"></i> 4.8</li>
                          <li><i class="fa fa-clock-o fa-fw"></i> 20 min</li>
                          <li><i class="fa fa-graduation-cap fa-fw"></i> Beginner</li>
                        </ul>
                      </div>
                    </div>
                    <div class="view-all-comments">
                      <a href="#">
                        <i class="fa fa-comments-o"></i> View all
                      </a>
                      <span>10 comments</span>
                    </div>
                    <ul class="comments">
                        <li class="media">
                          <div class="media-left">
                            <a href="">
                              <img src="{{asset('web/images/people/50/guy-5.jp')}}g" class="media-object">
                            </a>
                          </div>
                          <div class="media-body">
                            <div class="pull-right dropdown" data-show-hover="li">
                              <a href="#" data-toggle="dropdown" class="toggle-button">
                                <i class="fa fa-pencil"></i>
                              </a>
                              <ul class="dropdown-menu" role="menu">
                                <li><a href="#">Edit</a></li>
                                <li><a href="#">Delete</a></li>
                              </ul>
                            </div>
                            <a href="" class="comment-author pull-left">Bill D.</a>
                            <span>Hi Mary, Nice Party</span>
                            <div class="comment-date">21st September</div>
                          </div>
                        </li>
                        <li class="media">
                          <div class="media-left">
                            <a href="">
                              <img src="{{asset('web/images/people/50/woman-5.jpg')}}" class="media-object">
                            </a>
                          </div>
                          <div class="media-body">
                            <div class="pull-right dropdown" data-show-hover="li">
                              <a href="#" data-toggle="dropdown" class="toggle-button">
                                <i class="fa fa-pencil"></i>
                              </a>
                              <ul class="dropdown-menu" role="menu">
                                <li><a href="#">Edit</a></li>
                                <li><a href="#">Delete</a></li>
                              </ul>
                            </div>
                            <a href="" class="comment-author pull-left">Mary</a>
                            <span>Thanks Bill</span>
                            <div class="comment-date">2 days</div>
                          </div>
                        </li>
                        <li class="media">
                          <div class="media-left">
                            <a href="">
                              <img src="{{asset('web/images/people/50/guy-5.jpg')}}" class="media-object">
                            </a>
                          </div>
                          <div class="media-body">
                            <div class="pull-right dropdown" data-show-hover="li">
                              <a href="#" data-toggle="dropdown" class="toggle-button">
                                <i class="fa fa-pencil"></i>
                              </a>
                              <ul class="dropdown-menu" role="menu">
                                <li><a href="#">Edit</a></li>
                                <li><a href="#">Delete</a></li>
                              </ul>
                            </div>
                            <a href="" class="comment-author pull-left">Bill D.</a>
                            <span>What time did it finish?</span>
                            <div class="comment-date">14 min</div>
                          </div>
                        </li>
                        <li class="comment-form">
                          <div class="input-group">
                            <span class="input-group-btn">
                               <a href="" class="btn btn-default"><i class="fa fa-photo"></i></a>
                            </span>
                            <input type="text" class="form-control" />
                          </div>
                        </li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>


@endsection