@extends('layout.page')
@section('title','Profile')
@section('activeh','active')
@section('profile')
<div class="container mx-auto">
@foreach ($posts as $post)

<!-- This example requires Tailwind CSS v2.0+ -->
<div class="bg-white shadow overflow-hidden sm:rounded-lg">
  <div class="px-4 py-5 sm:px-6">
    <h3 class="text-lg leading-6 font-medium text-gray-900">
      {{ $post->username }}
    </h3>
    <p class="mt-1 max-w-2xl text-sm text-gray-500">
      Personal details.
    </p>
  </div>
  <div class="border-t border-gray-200">
    <dl>
      <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
        <dt class="text-lg font-large text-gray-500">
          First Name
        </dt>
        <dd class="mt-1 text-lg text-gray-900 sm:mt-0 sm:col-span-2">
          {{ $post->firstname }}
        </dd>
      </div>
      <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
        <dt class="text-lg font-medium text-gray-500">
          Last Name
        </dt>
        <dd class="mt-1 text-lg text-gray-900 sm:mt-0 sm:col-span-2">
          {{ $post->lastname }}
        </dd>
      </div>
      <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
        <dt class="text-lg font-medium text-gray-500">
          Email address
        </dt>
        <dd class="mt-1 text-lg text-gray-900 sm:mt-0 sm:col-span-2">
          {{ $post->email }}
        </dd>
      </div>
      <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
        <dt class="text-lg font-medium text-gray-500">
         Phone Number
        </dt>
        <dd class="mt-1 text-lg text-gray-900 sm:mt-0 sm:col-span-2">
          0{{ $post->NoHP }}
        </dd>
      </div>
    </dl>
  </div>
</div>

@endforeach
    
@endsection
