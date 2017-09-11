@extends('layouts.farm')

@section('title')
	Native Animals PH | Duck Individual Records
@endsection

@section('initScript')
	<link type="text/css" rel="stylesheet" href="{{asset('css/record.css')}}"  media="screen,projection"/>
@endsection

@section('content')
<div class="row">
	<div class="col s10 center">
		<div class="col s12">
          <h4>Family Records</h4>
          <div class="row">
            <div class="col s12">
              <ul class="tabs">
                <li class="tab col s6"><a class="black-text" href="#gm">Phenotypic</a></li>
                <li class="tab col s6"><a class="black-text" href="#mc">Morphometric</a></li>	
              </ul>
            </div>

            <div id="gm" class="col s12">
              <form class="row">
                <div class="col s6 offset-s2">
                  <ul class="collapsible" data-collapsible="expandable">
                    <li>
                      <div class="collapsible-header">Plumage Pattern</div>
                      <div class="collapsible-body">
                        <div class="row">
                          <div class="col s6">
                            <input class="with-gap" name="hairtype" type="radio" id="curly"  />
                            <label for="curly">Dusky</label>
                          </div>
                          <div class="col s6">
                            <input class="with-gap" name="hairtype" type="radio" id="straighthair"  />
                            <label for="straighthair">Plain brown</label>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col s6">
                            <input class="with-gap" name="hairtype" type="radio" id="short"  />
                            <label for="short">Magpie</label>
                          </div>
                          <div class="col s6">
                            <input class="with-gap" name="hairtype" type="radio" id="long"  />
                            <label for="long">Mallard</label>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col s6">
                            <input class="with-gap" name="hairtype" type="radio" id="dense"  />
                            <label for="dense">Restricted</label>
                          </div>
                          
                        </div>
                      </div>
                    </li>
                    <li>
                      <div class="collapsible-header">Plumage Color</div>
                      <div class="collapsible-body">
                        <div class="row">
                          <div class="col s6">
                            <input class="with-gap" name="tusks" type="radio" id="white"  />
                            <label for="white">White</label>
                          </div>
                          <div class="col s6">
                            <input class="with-gap" name="tusks" type="radio" id="brown"  />
                            <label for="brown">Brown</label>
                          </div>
                          <div class="col s6">
                            <input class="with-gap" name="tusks" type="radio" id="black"  />
                            <label for="black">Black</label>
                          </div>
                          <div class="col s6">
                            <input class="with-gap" name="tusks" type="radio" id="blackbrown"  />
                            <label for="blackbrown">Black with brown</label>
                          </div>
                          <div class="col s6">
                            <input class="with-gap" name="tusks" type="radio" id="brownblack"  />
                            <label for="brownblack">Brown with black</label>
                          </div>

                        </div>
                      </div>
                    </li>
                    <li>
                      <div class="collapsible-header">Neck Feather Markings</div>
                      <div class="collapsible-body">
                        <div class="row">
                          <div class="col s6">
                            <input class="with-gap" name="snout" type="radio" id="plain"  />
                            <label for="plain">plain</label>
                          </div>
                          <div class="col s6">
                            <input class="with-gap" name="snout" type="radio" id="bib"  />
                            <label for="bib">with bib</label>
                          </div>
                          <div class="col s6">
                            <input class="with-gap" name="snout" type="radio" id="small"  />
                            <label for="small">small</label>
                          </div>
                          <div class="col s6">
                            <input class="with-gap" name="snout" type="radio" id="medium"  />
                            <label for="medium">medium</label>
                          </div>
                          <div class="col s6">
                            <input class="with-gap" name="snout" type="radio" id="large"  />
                            <label for="large">large</label>
                          </div>
                          
                        </div>
                      </div>
                    </li>
                    <li>
                      <div class="collapsible-header">Wing Feather Color</div>
                      <div class="collapsible-body">
                        <div class="row">
                          <div class="col s6">
                            <input class="with-gap" name="colorpattern" type="radio" id="white"  />
                            <label for="white">White</label>
                          </div>
                          <div class="col s6">
                            <input class="with-gap" name="colorpattern" type="radio" id="brown"  />
                            <label for="brown">Brown</label>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col s6">
                            <input class="with-gap" name="colorpattern" type="radio" id="black"  />
                            <label for="black">Black</label>
                          </div>
                          <div class="col s6">
                            <input class="with-gap" name="colorpattern" type="radio" id="brownwhite"  />
                            <label for="brownwhite">Brown with White</label>
                          </div>
                          <div class="col s6">
                            <input class="with-gap" name="colorpattern" type="radio" id="blackwhite"  />
                            <label for="blackwhite">Black with White</label>
                          </div>


                        </div>
                      </div>
                    </li>
                    <li>
                      <div class="collapsible-header">Tail Feather Color</div>
                      <div class="collapsible-body">
                        <div class="row">
                          <div class="col s6">
                            <input class="with-gap" name="coat" type="radio" id="white"  />
                            <label for="white">White</label>
                          </div>
                          <div class="col s6">
                            <input class="with-gap" name="coat" type="radio" id="black"  />
                            <label for="black">Black</label>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col s6">
                            <input class="with-gap" name="coat" type="radio" id="brown"  />
                            <label for="brown">Brown</label>
                          </div>
                          <div class="col s6">
                            <input class="with-gap" name="coat" type="radio" id="brownwhite"  />
                            <label for="brownwhite">Brown with White</label>
                          </div>
                        </div>
                      </div>
                    </li>

                    <li>
                      <div class="collapsible-header">Bill Color</div>
                      <div class="collapsible-body">
                        <div class="row">
                          <div class="col s6">
                            <input class="with-gap" name="head" type="radio" id="pink-white"  />
                            <label for="pink-white">Pink-white</label>
                          </div>
                          <div class="col s6">
                            <input class="with-gap" name="head" type="radio" id="yellow"  />
                            <label for="yellow">Yellow</label>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col s6">
                            <input class="with-gap" name="head" type="radio" id="orange"  />
                            <label for="orange">Orange</label>
                          </div>
                          <div class="col s6">
                            <input class="with-gap" name="head" type="radio" id="slate-grey"  />
                            <label for="slate-grey">Slate-grey</label>
                          </div>
                          <div class="col s6">
                            <input class="with-gap" name="head" type="radio" id="green"  />
                            <label for="green">Green</label>
                          </div>
                          <div class="col s6">
                            <input class="with-gap" name="head" type="radio" id="black"  />
                            <label for="black">Black</label>
                          </div>
                          <div class="col s6">
                            <input class="with-gap" name="head" type="radio" id="blacktip"  />
                            <label for="blacktip">Black-tip</label>
                          </div>
                          <div class="col s6">
                            <input class="with-gap" name="head" type="radio" id="others"  />
                            <label for="others">Others</label>
                          </div>
                        </div>
                      </div>
                    </li>
                    <li>
                      <div class="collapsible-header">Bill Shape</div>
                      <div class="collapsible-body">
                        <div class="row">
                          <div class="col s6">
                            <input class="with-gap" name="skin" type="radio" id="uniform"  />
                            <label for="uniform">Uniform</label>
                          </div>
                          <div class="col s6">
                            <input class="with-gap" name="skin" type="radio" id="saddle"  />
                            <label for="saddle">Saddle</label>
                          </div>
                        </div>
                      </div>
                    </li>
                    <li>
                      <div class="collapsible-header">Bean Color</div>
                      <div class="collapsible-body">
                        <div class="row">
                          <div class="col s6">
                            <input class="with-gap" name="ear" type="radio" id="white"  />
                            <label for="white">White</label>
                          </div>
                          <div class="col s6">
                            <input class="with-gap" name="ear" type="radio" id="darkbrown"  />
                            <label for="darkbrown">Dark Brown</label>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col s6">
                            <input class="with-gap" name="ear" type="radio" id="black"  />
                            <label for="black">Black</label>
                          </div>
                          <div class="col s6">
                            <input class="with-gap" name="ear" type="radio" id="others"  />
                            <label for="others">Others</label>
                          </div>
                        </div>
                      </div>
                    </li>
                    <li>
                      <div class="collapsible-header">Crested</div>
                      <div class="collapsible-body">
                        <div class="row">
                          <div class="col s6">
                            <input class="with-gap" name="backline" type="radio" id="yes"  />
                            <label for="yes">Yes</label>
                          </div>
                          <div class="col s6">
                            <input class="with-gap" name="backline" type="radio" id="no"  />
                            <label for="no">No</label>
                          </div>
                        </div>
                      </div>
                    </li>
                    <li>
                      <div class="collapsible-header">Eye Color</div>
                      <div class="collapsible-body">
                        <div class="row">
                          <div class="col s6">
                            <input class="with-gap" name="backline" type="radio" id="yellow"  />
                            <label for="yellow">Yellow</label>
                          </div>
                          <div class="col s6">
                            <input class="with-gap" name="backline" type="radio" id="orange"  />
                            <label for="brown">Orange</label>
                          </div>
                          <div class="col s6">
                            <input class="with-gap" name="backline" type="radio" id="brown"  />
                            <label for="yellow">Brown</label>
                          </div>
                          <div class="col s6">
                            <input class="with-gap" name="backline" type="radio" id="greybrown"  />
                            <label for="greybrown">Grey-brown</label>
                          </div>
                        </div>

                        <div class="row">
                          <div class="col s6">
                            <input class="with-gap" name="backline" type="radio" id="blue"  />
                            <label for="blue">Blue</label>
                          </div>
                          <div class="col s6">
                            <input class="with-gap" name="backline" type="radio" id="black"  />
                            <label for="black">Black</label>
                          </div>
                          <div class="col s6">
                            <input class="with-gap" name="backline" type="radio" id="others"  />
                            <label for="others">Others</label>
                          </div>
                        </div>
                      </div>
                    </li>

                    <li>
                      <div class="collapsible-header">Skin Color</div>
                      <div class="collapsible-body">
                        <div class="row">
                          <div class="col s6">
                            <input class="with-gap" name="backline" type="radio" id="white"  />
                            <label for="whitw">White</label>
                          </div>
                          <div class="col s6">
                            <input class="with-gap" name="backline" type="radio" id="yellow"  />
                            <label for="yellow">Yellow</label>
                          </div>
                          <div class="col s6">
                            <input class="with-gap" name="backline" type="radio" id="black"  />
                            <label for="black">Black</label>
                          </div>
                        </div>
                      </div>
                    </li>

                    <li>
                      <div class="collapsible-header">Shank Color</div>
                      <div class="collapsible-body">
                        <div class="row">
                   	 	 <div class="col s6">
                            <input class="with-gap" name="backline" type="radio" id="yellow"  />
                            <label for="yellow">Yellow</label>
                          </div>
                          <div class="col s6">
                            <input class="with-gap" name="backline" type="radio" id="white"  />
                            <label for="white">White</label>
                          </div>
                          
                          <div class="col s6">
                            <input class="with-gap" name="backline" type="radio" id="black"  />
                            <label for="black">Black</label>
                          </div>
                          <div class="col s6">
                            <input class="with-gap" name="backline" type="radio" id="green"  />
                            <label for="green">Green</label>
                          </div>
                          <div class="col s6">
                            <input class="with-gap" name="backline" type="radio" id="slategrey"  />
                            <label for="slategrey">Slate-grey</label>
                          </div>
                          <div class="col s6">
                            <input class="with-gap" name="backline" type="radio" id="orange"  />
                            <label for="orange">Orange</label>
                          </div>
                        </div>
                        
                        </div>
                    </li>

                    <li>
                      <div class="collapsible-header">Body Carriage</div>
                      <div class="collapsible-body">
                        <div class="row">
                   	 	 <div class="col s6">
                            <input class="with-gap" name="backline" type="radio" id="horizontal"  />
                            <label for="horizontal">Horizontal</label>
                          </div>
                          <div class="col s6">
                            <input class="with-gap" name="backline" type="radio" id="slightlyupright"  />
                            <label for="slightlyupright">Slightly Upright</label>
                          </div>
                          
                          <div class="col s6">
                            <input class="with-gap" name="backline" type="radio" id="upright"  />
                            <label for="upright">Upright</label>
                          </div>
                          
                        </div>
                        
                        </div>
                      </div>
                    </li>
                  </ul>

                
                <div class="col s3 offset-s1 center">
                  <img src="images/sow.jpg" height="150" width="150" style="border:2px solid black" />
                </div>
                <div class="col s3 offset-s1 center">
                  Duck ID<br>
                  <input disabled value="QUEBAI" id="segment1" type="text" name="sowid" class="validate col s5" /> <input placeholder="BP20161F" id="segment2" type="text" name="sowid" class="validate col s5 offset-s2"> <input placeholder="2050" id="segment3" type="text" name="sowid" class="validate col s12">
                </div>
                <div class="row">
                  <div class="col s3 offset-s4">
                    <a href="#!" class="btn waves-effect waves-light green darken-4"><i class="material-icons left">save</i>Save</a>
                  </div>
                </div>
              </form>
            </div>
            <div id="mc" class="col s12">
              <form class="row">
                <div class="col s7 offset-s1">
                  <div class="col s8">
                    <ul class="collapsible" data-collapsible="expandable">
                      <li>
                        <div class="collapsible-header">Body weight</div>
                        <div class="collapsible-body">
                          <input id="bodyweight" placeholder="kg" type="text" class="validate" />
                        </div>
                      </li>
                      <li>
                        <div class="collapsible-header">Wing Span</div>
                        <div class="collapsible-body">
                        <input id="bodylength" placeholder="cm" type="text" class="validate" />
                        </div>
                      </li>
                      <li>
                        <div class="collapsible-header">Bill Length</div>
                        <div class="collapsible-body">
                        <input id="pelvic" placeholder="cm" type="text" class="validate" />
                        </div>
                      </li>
                      <li>
                        <div class="collapsible-header">Circumference of the Chest</div>
                        <div class="collapsible-body">
                        <input id="normalteats" placeholder="0" type="text" class="validate" />
                        </div>
                      </li>
                      <li>
                        <div class="collapsible-header">Body Length</div>
                        <div class="collapsible-body">
                          <input id="headlength" placeholder="cm" type="text" class="validate" />
                        </div>
                      </li>
                      <li>
                        <div class="collapsible-header">Neck Length</div>
                        <div class="collapsible-body">
                          <input id="hearthgirth" placeholder="cm" type="text" class="validate" />
                        </div>
                      </li>
                      <li>
                        <div class="collapsible-header">Shank Length</div>
                        <div class="collapsible-body">
                          <input id="pindex" placeholder="kg/m^3" type="text" class="validate" />
                        </div>
                      </li>
                    </ul>
                  </div>
                  
                <div class="col s3 offset-s1 center">
                  <img src="images/sow.jpg" height="150" width="150" style="border:2px solid black" />
                </div>
                <div class="col s3 offset-s1 center">
                  Duck ID<br>
                  <input disabled value="QUEBAI" id="segment1" type="text" name="sowid" class="validate col s5" /> <input placeholder="BP20161F" id="segment2" type="text" name="sowid" class="validate col s5 offset-s2"> <input placeholder="2050" id="segment3" type="text" name="sowid" class="validate col s12">
                </div>
                <div class="row">
                  <div class="col s3 offset-s4">
                    <a href="#!" class="btn waves-effect waves-light green darken-4"><i class="material-icons left">save</i>Save</a>
                  </div>
                </div>
              </form>
            </div>

           
          </div>
        </div>

	</div>
</div>
@endsection
@section('script')
	<script type="text/javascript" src="{{asset('js/record.js')}}"></script>
@endsection