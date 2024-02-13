
@extends('layouts.admin_app')

@section('main-content-inner')

    <!-- sales report area start -->
    {{-- @php $locale = session()->get('locale'); @endphp --}}
    {{-- <li class="nav-item dropdown">
        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
            @switch($locale)
                @case('ru')
                <img src="{{asset('assets/images/flag/ru.png')}}" width="25px"> Russian
                @break
                @case('am')
                <img src="{{asset('assets/images/flag/am.png')}}" width="25px"> Armenia
                @break
                @default
                <img src="{{asset('assets/images/flag/en.png')}}" width="25px"> English
            @endswitch
            <span class="caret"></span>
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="lang/ru"><img src="{{asset('assets/images/flag/ru.png')}}" width="25px"> Russian</a>
            <a class="dropdown-item" href="lang/am"><img src="{{asset('assets/images/flag/am.png')}}" width="25px"> Armenian</a>
        </div>
    </li> --}}
    <!-- sales report area end -->
    <!-- overview area start -->
    <div class="row mt-5">
        <div class="col-xl-9 col-lg-8">
            <div class="card">
                <div class="card-body">
                    <form  action="{{route('category.store')}}" method="post">
                        @csrf
                        {{-- @foreach (languages() as  $lng)
                            <div class="category_banner">
                                <div class="flex mb-2 p-2">
                                    <label for="inputPassword" class="col-form-label">@lang('category_name') {{ Str::upper($lng->name) }}</label>
                                    <div class="col-sm-12">
                                        <input  class="form-control" name="translations[{{$lng->id}}][name]" value="{{old("translations.$lng->id.name")}}"/>

                                    </div>
                                </div>
                                @error("translations.$lng->id.name")
                                    <div class="error_message" > {{ $message }} </div>
                                @enderror
                            </div>
                        @endforeach --}}

                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>Select parent category*</label>

                                <select type="text" name="parent_id" class="form-control">
                                    <option value="" >None</option>
                                    {{-- @if($categories)

                                        @foreach($categories as $category)

                                            <option value="{{$category->id}}">{{$category->translation(1)->name}}</option>
                                        @endforeach
                                    @endif --}}
                                </select>
                            </div>
                        </div>
                        <button type="submit">Submit</button>
                    </form>
                    <div id="verview-shart"></div>
                </div>
            </div>
        </div>

    </div>
    <!-- overview area end -->
    <!-- market value area start -->

    <!-- row area start-->
@endsection
