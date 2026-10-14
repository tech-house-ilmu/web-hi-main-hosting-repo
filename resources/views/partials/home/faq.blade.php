<!-- FAQ Section -->
<section class="faq max-w-7xl mx-auto px-4 mt-5" x-data="{ openItem: null }">
  <div class="faq-container flex flex-col justify-center py-8 gap-4">
    <h1 class="w-full text-center font-bold text-3xl py-3 mt-2" style="color: #083d77;">
      Frequently Ask Questions
    </h1>
    <div class="faq-list space-y-0">
      @foreach($faqs as $faq)
        @php
          $id = $faq['id'];
          $isFirst = $loop->first;
          $isLast = $loop->last;
        @endphp
        <div class="accordion-item overflow-hidden bg-white shadow transition-all duration-300 {{ $isFirst ? '!rounded-t-xl' : '' }} {{ $isLast ? '!rounded-b-xl' : '' }}"
             @if($isLast) :class="openItem === {{ $id }} ? 'rounded-b-none' : 'rounded-b-lg'" @endif>
          <button @click="openItem = openItem === {{ $id }} ? null : {{ $id }}"
                  class="w-full text-left text-base px-4 py-3 border border-neutral-500 flex justify-between items-center font-normal transition-colors duration-300 lg:text-lg {{ $isFirst ? 'rounded-t-xl' : '' }} {{ $isLast ? 'rounded-b-xl' : '' }}"
                  :class="openItem === {{ $id }} ? 'bg-[#1746A2] text-white' : 'bg-white text-black'">
            {{ $faq['question'] }}
            <svg :class="{'transform rotate-180': openItem === {{ $id }}}"
                 class="w-7 h-7 transition-transform duration-300 md:w-10 md:h-10"
                 fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M19 9l-7 7-7-7" />
            </svg>
          </button>
          <div class="overflow-hidden transition-[max-height,opacity]"
               :class="openItem === {{ $id }} ? 'max-h-[999px] opacity-100 duration-700' : 'max-h-0 opacity-0 duration-500'">
            <div class="accordion-body border-t border-gray-300 px-4 py-3 text-gray-700 xl:text-lg bg-white">
              {{ $faq['answer'] }}
            </div>
          </div>
        </div>
      @endforeach
    </div>
  </div>
</section>
