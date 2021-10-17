<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    @php $result = \App\Models\Answer::where('user_id', Auth::user()->id)->sum('marks'); @endphp
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @if(empty($result))
                    <a class="btn btn-primary" href="{{route('started')}}">Click here</a> to start the exam.
                    @elseif(empty($is_attempt_now))
                    <h1>Thank you, you already attended the exam and your score is {{ $result }} out of 5</h1>
                    @else
                    <h1>Thank you, your score is {{ $result }} out of 5</h1>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
