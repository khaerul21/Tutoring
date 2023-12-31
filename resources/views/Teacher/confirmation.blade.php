@extends('Teacher/teacher')
@section('Subcontent')

<div class="mb-10">
    <ol class="flex items-center w-full text-sm font-medium text-center text-gray-500 sm:text-base">
        <li class="flex md:w-full items-center text-blue-600 sm:after:content-[''] after:w-full after:h-1 after:border-b after:border-gray-200 after:border-1 after:hidden sm:after:inline-block after:mx-6 xl:after:mx-10">
            <span class="flex items-center after:content-['/'] sm:after:hidden after:mx-2 after:text-gray-200">
                <svg class="w-3.5 h-3.5 sm:w-4 sm:h-4 me-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z"/>
                </svg>
                Create <span class="hidden sm:inline-flex sm:ms-2">Course</span>
            </span>
        </li>
        <li class="flex md:w-full items-center after:content-[''] text-blue-600 after:w-full after:h-1 after:border-b after:border-gray-200 after:border-1 after:hidden sm:after:inline-block after:mx-6 xl:after:mx-10">
            <span class="flex items-center after:content-['/'] sm:after:hidden after:mx-2 after:text-gray-200">
                <svg class="w-3.5 h-3.5 sm:w-4 sm:h-4 me-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z"/>
                </svg>
                Add <span class="hidden sm:inline-flex sm:ms-2">Content</span>
            </span>
        </li>
        <li class="flex md:w-full items-center after:content-[''] text-blue-600 after:w-full after:h-1 after:border-b after:border-gray-200 after:border-1 after:hidden sm:after:inline-block after:mx-6 xl:after:mx-10">
            <span class="flex items-center after:content-['/'] sm:after:hidden after:mx-2 after:text-gray-200">
                <svg class="w-3.5 h-3.5 sm:w-4 sm:h-4 me-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z"/>
                </svg>
                Confirmation <span class="hidden sm:inline-flex sm:ms-2">Course</span>
            </span>
        </li>
        </ol>
</div>
<div class="w-full p-4 text-center bg-white border border-gray-200 rounded-lg shadow sm:p-8">
    <h5 class="mb-2 text-3xl font-bold text-gray-900">{{$course->course_name}}</h5>
    <p class="mb-5 text-base text-gray-500 sm:text-lg">Stay up to date and move work forward with Flowbite on iOS & Android. Download the app today.</p>
</div>
<div class="container flex flex-wrap flex-grow mx-auto mt-10 mb-10 justify-center items-center">
    <h2 class="mb-2 text-3xl font-bold text-gray-900">List Contents</h2>
</div>
<div class="container flex flex-wrap flex-grow mx-auto mt-10 mb-10 justify-center items-center">
    @if(count($content) > 0)
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Name
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Status
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($content as $content)
                        <tr class="bg-white border-b hover:bg-gray-50">
                            <th scope="row" class="flex items-center px-6 py-4 text-gray-900 whitespace-nowrap">
                                <img class="w-10 h-10 rounded-full" src="{{ asset('../images/student.jpg') }}" alt="Jese image">
                                <div class="ps-3">
                                    <div class="text-base font-semibold">{{ $content->title }}</div>
                                </div>  
                            </th>
                            <td class="px-6 py-4">
                                On Progress
                            </td>
                            <td class="flex px-6 py-4">
                                <form action="{{ route('teacher-content.destroy', ['content' => $content->id]) }}" method="POST" onsubmit=" return confirm('Are you sure you want to delete {{$content->id}}?') ">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }} 
                                    <button type="submit" class="ml-3 inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-red-700 rounded-lg hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-blue-300">
                                        Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @else
        <p class="flex flex-wrap mx-auto mt-10 mb-10 justify-center items-center">No contents available</p>
        @endif
</div>
<div class='container  flex flex-wrap flex-grow mx-auto mt-10 mb-10 justify-center items-center'>
    

    <form action="{{ route('admin-course-delete', $course->id) }}" method="POST" onsubmit=" return confirm('Are you sure you want to delete?') ">
        {{ csrf_field() }}
        {{ method_field('DELETE') }} 
        <button type="submit" class="mr-9 inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-red-700 rounded-lg hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-blue-300">
            Delete Course
        </button>
    </form>
    
    
    <a href="{{route('teacher-courses')}}" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300">
        Save Course
        <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
        </svg>
    </a>
</div>
@endsection


