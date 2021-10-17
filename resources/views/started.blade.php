<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <?php //dd($questions) ?>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
    
                    <form action="{{ route('formPost') }}" id="form" method="POST">
                        @csrf
                    <div class="form-group">
                        @php $key=1; @endphp
                        @foreach($questions as $val)
                      <label for="usr">{{ $val->name }}:</label>
                            @php
                           $options = \App\Models\Option::where(['ques_id' => $val->id])->get();
                            @endphp
                            @foreach($options as $option)
                               <div class="radio">
                                   <label><input type="radio" name="option{{ $key }}" value="{{ $option->marks }}">{{ $option->name }}</label>
                             </div>
                            @endforeach
                            <input type="hidden" name="ques_id{{ $key }}" value="{{ $val->id }}">
                            
                          @php $key++; @endphp
                       @endforeach
                       <div class="text-center">
                       <input class="btn btn-primary" type="submit" value="SUBMIT">
                       </div>
                    </div>
                    </form>
                        
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
