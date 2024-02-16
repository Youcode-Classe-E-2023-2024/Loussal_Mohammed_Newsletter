@include('partials.header')
<body>
<div class="relative flex min-h-screen flex-col justify-center overflow-hidden bg-slate-100 py-6 sm:py-12">
    <div class="min-h-28 ">
        <div class="max-w-screen-lg mx-auto py-4">
            <h2 class="font-bold text-center text-6xl text-slate-700 font-display">
                Our Blog Post
            </h2>
            <p class="text-center mt-4 font-medium text-slate-500">OUR NEWS FEED</p>
            @foreach($medias as $media)
                @foreach($media->getMedia() as $mediaItem)
                    <tr>
                        <th class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 text-left text-blueGray-700 ">
                            {{ $mediaItem->name }}
                        </th>
                        <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 ">
                            {{ $mediaItem->type }}
                        </td>
                        <td class="border-t-0 px-6 align-center border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                            {{ $mediaItem->size }}
                        </td>
                        <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                            {{ $mediaItem->created_at->toFormattedDateString() }}
                        </td>
                        <td class="p-2 align-middle bg-transparent border-b-0 whitespace-nowrap shadow-transparent">
                            <form action="{{ route('delete.media', ['id' => $mediaItem->id]) }}"
                                  method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit">
                                    <a class="relative z-10 inline-block px-4 py-2.5 mb-0 font-bold text-center text-transparent align-middle transition-all border-0 rounded-lg shadow-none cursor-pointer leading-normal text-sm ease-in bg-150 bg-gradient-to-tl from-red-600 to-orange-600 hover:-translate-y-px active:opacity-85 bg-x-25 bg-clip-text"
                                       href="javascript:;"><i
                                            class="mr-2 far fa-trash-alt bg-150 bg-gradient-to-tl from-red-600 to-orange-600 bg-x-25 bg-clip-text"></i></a>
                                </button>
                            </form>
                        </td>
                    </tr>
@endforeach
@endforeach
</body>
@include('partials.footer')
