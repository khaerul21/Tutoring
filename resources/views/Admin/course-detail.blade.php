@extends('Admin/admin')
@section('Subcontent')

<h1 class="mb-4 text-4xl flex flex-wrap font-extrabold leading-none tracking-tight text-gray-900 justify-center items-center md:text-5xl lg:text-6xl">{{$course->course_name}}</h1>

<div class="container flex flex-wrap mx-auto mt-10 mb-10 justify-center items-center">
    <p class="mb-6 text-lg font-normal text-gray-500 lg:text-xl sm:px-16 xl:px-48">{{$course->description}}</p>
    <a href="{{ route('admin-create-content', ['idcourse' => $course->id]) }}" class="m-4 inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300">
        + Add New Content
    </a>
</div>

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
                                <a href="{{route('admin-content.edit', $content->id)}}" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300">Edit Content</a>
                                <form action="{{ route('admin-content.destroy', ['admin' => $content->id]) }}" method="POST" onsubmit=" return confirm('Are you sure you want to delete {{$content->id}}?') ">
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



@endsection


