<section class="py-1 bg-blueGray-50">
    <div class="w-full lg:w-8/12 px-4 mx-auto mt-6">
        @if(\Illuminate\Support\Facades\Session::has('success'))
            <div class="py-3">
                <div
                    class="inline-flex items-center bg-white leading-none text-pink-600 rounded-full p-2 shadow text-teal text-sm">
                    <span class="inline-flex bg-pink-600 text-white rounded-full h-6 px-3 justify-center items-center">Sukses!</span>
                    <span class="inline-flex px-2">{!! \Illuminate\Support\Facades\Session::get('success') !!}</span>
                </div>
            </div>
        @endif

        <div
            class="relative flex flex-col min-w-0 break-words w-full mb-6 shadow-lg rounded-lg bg-blueGray-100 border-0">
            <div class="rounded-t bg-white mb-0 px-6 py-6">
                <div class="text-center flex justify-between">
                    <h6 class="text-blueGray-700 text-xl font-bold">
                        Status Pendaftaran Kegiatan MBKM
                    </h6>
                    @if(!isset($from_noreg))
                        <a href="{{url("/mbkm/daftar")}}"
                           class="bg-pink-500 text-white active:bg-pink-600 font-bold uppercase text-xs px-4 py-2 rounded shadow hover:shadow-md outline-none focus:outline-none mr-1 ease-linear transition-all duration-150"
                           type="button">
                            Edit Data
                        </a>
                    @endif

                </div>
            </div>
            <div class="flex-auto bg-gray-100 px-4 lg:px-10 py-10 pt-0">
                <h6 class="text-blueGray-400 text-sm mt-3 mb-6 font-bold uppercase">
                    Informasi Logbook
                </h6>
                <div class="flex flex-wrap">
                    <div class="w-full lg:w-6/12 px-4">
                        <div class="relative w-full mb-3">
                            <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2"
                                   htmlfor="grid-password">
                                Tanggal Bimbingan
                            </label>
                            <input type="text" disabled
                                   class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                                   value="{{ }}">
                        </div>
                    </div>
                    <div class="w-full lg:w-6/12 px-4">
                        <div class="relative w-full mb-3">
                            <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2"
                                   htmlfor="grid-password">
                                Tempat
                            </label>
                            <input type="number" disabled
                                   class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                                   value="{{$mhsw_mbkm->getMhsw()->first()->ident}}">
                        </div>
                    </div>

                <hr class="mt-6 border-b-1 border-blueGray-300">

                <h6 class="text-blueGray-400 text-sm mt-3 mb-6 font-bold uppercase">
                    Deskripsi
                </h6>
                <div class="flex flex-wrap">
                    <div class="w-full lg:w-12/12 px-4">
                        <div class="relative w-full mb-3">
                            <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2"
                                   htmlfor="grid-password">
                                Uraian Kegiatan Bimbingan
                            </label>
                            <textarea disabled type="text"
                                      class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                                      rows="4">{{}}</textarea>
                        </div>
                    </div>
                    <div class="w-full lg:w-12/12 px-4">
                        <div class="relative w-full mb-3">
                            <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2"
                                   htmlfor="grid-password">
                                   Rencana Pencapaian
                            </label>
                            <textarea disabled type="text"
                                      class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                                      rows="4">{{}}</textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
