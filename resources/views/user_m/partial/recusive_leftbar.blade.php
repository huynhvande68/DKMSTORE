                                            
                                            <ul class="collapse list-unstyled" id="{{$leftbar_item->slug}}">
                                           @if($leftbar_item->category_rev->count())
                                                @foreach($leftbar_item->category_rev as $item_loop)
                                                <li class = "pd">
                                                
                                                  <span href="#{{$item_loop->slug}}" data-toggle="collapse" aria-expanded="true" class="check ">  
                                                    @if($item_loop->category_rev->count())
                                                    <i class ="dropdown-toggle"></i> 
                                                    @endif

                                                <label class="custom_boxed">{{$item_loop->nameCategory}}
                                                    <input type="radio" checked="checked" name="radio" value = "{{$item_loop->id}}">
                                                    <span class="checkmark"></span>
                                                </label> 
                                                 </span>
                                                @if($item_loop->category_rev->count())
                                                
                                                    
                                                    @include('user_m.partial.recusive_leftbar',['leftbar_item'=> $item_loop])

                                                    
                                                @endif                                          
                                                </li>
                                                @endforeach
                                            @endif
                                        </ul>