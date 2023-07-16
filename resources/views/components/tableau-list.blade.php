<!-- tableau-liste.blade.php -->
@props(['tableau_headers'])

<div class="table-responsive mdtableListe">
  <table class="align-middle mb-0">
    <tr class="mb-5">
      @foreach ($tableau_headers as $header)
        <th class="mdthListe text-center">
          @if ($header['icon'])
            <i class="{{ $header['icon'] }}"></i>
          @endif
          {{ $header['text'] }}
        </th>
      @endforeach
      <th class="text-center mdthListe thAction">Action</th>
    </tr>
    {{$slot}}
  </table>
</div>
