<!-- FAQ Section (Figma Exact Implementation) -->
<section id="faq" class="faq-section" data-aos="fade-up">
    <div class="faq-container">
        <!-- Section Header -->
        <div class="faq-header">
            <h2 class="faq-title">
                GET TO KNOW MORE ABOUT HI
            </h2>
            <div class="faq-divider"></div>
            <p class="faq-subtitle">
                Kenali House Ilmu Indonesia melalui beberapa pertanyaan singkat.
            </p>
        </div>

        @php
            $displayFaqs = !empty($faqs) ? $faqs : config('homepage.faqs', []);
        @endphp

        <!-- Accordion Items Container (W: 950px, gap: 12px) -->
        <div class="faq-accordion-list" x-data="{ openItem: 1 }">
            @foreach($displayFaqs as $faq)
                @php
                    $id = $faq['id'] ?? $loop->iteration;
                @endphp
                <div class="faq-item" :class="{ 'is-active': openItem === {{ $id }} }">
                    <button type="button"
                            @click="openItem = openItem === {{ $id }} ? null : {{ $id }}"
                            class="faq-trigger"
                            :aria-expanded="openItem === {{ $id }} ? 'true' : 'false'">
                        <span class="faq-question">
                            {{ $faq['question'] }}
                        </span>
                        <span class="faq-icon" aria-hidden="true">
                            <span x-show="openItem === {{ $id }}" style="display: none;">&minus;</span>
                            <span x-show="openItem !== {{ $id }}">&#43;</span>
                        </span>
                    </button>

                    <div x-show="openItem === {{ $id }}"
                         x-collapse
                         class="faq-collapse">
                        <p class="faq-answer">
                            {{ $faq['answer'] }}
                        </p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

<style>
/* ==========================================================================
   FAQ Section - 1:1 Pixel-Perfect Figma Specification
   ========================================================================== */
.faq-section {
    width: 100%;
    background-color: #FFF9F0;
    padding-top: 50px;
    padding-bottom: 56px;
    box-sizing: border-box;
    overflow: hidden;
}

.faq-container {
    width: 100%;
    max-width: 1240px;
    margin-left: auto;
    margin-right: auto;
    padding-left: 20px;
    padding-right: 20px;
    box-sizing: border-box;
}

/* Header */
.faq-header {
    display: flex;
    flex-direction: column;
    align-items: center;
    text-align: center;
    margin-bottom: 34px;
}

/* H2 Title: Libre Baskerville 700, 28px / 35px, -0.68px, #FB7D0B */
.faq-title,
.faq-title * {
    font-family: 'Libre Baskerville', Georgia, serif !important;
}

.faq-title {
    font-weight: 700;
    font-size: 28px;
    line-height: 35px;
    letter-spacing: -0.68px;
    color: #FB7D0B;
    text-transform: uppercase;
    margin: 0;
    text-align: center;
}

/* Orange Divider Bar: 48px x 3px, #FF8B18 */
.faq-divider {
    width: 48px;
    height: 3px;
    background-color: #FF8B18;
    border-radius: 9999px;
    margin-top: 12px;
    margin-bottom: 12px;
}

/* Subtitle: Poppins 400, 14px / 22px, #465A74, max-w 580px */
.faq-subtitle {
    font-family: 'Poppins', sans-serif;
    font-weight: 400;
    font-size: 14px;
    line-height: 22px;
    letter-spacing: 0;
    color: #465A74;
    max-width: 580px;
    margin: 0 auto;
    text-align: center;
}

/* Accordion Wrapper: max-w 950px, gap 12px */
.faq-accordion-list {
    width: 100%;
    max-width: 950px;
    margin-left: auto;
    margin-right: auto;
    display: flex;
    flex-direction: column;
    gap: 12px;
}

/* Single Accordion Item Card */
.faq-item {
    background-color: #FFFFFF;
    border-radius: 8px;
    border: 1px solid #F0ECE4;
    box-shadow: 0 1px 4px rgba(10, 42, 87, 0.04);
    overflow: hidden;
    transition: box-shadow 0.2s ease, border-color 0.2s ease;
}

.faq-item:hover {
    border-color: #E6DFD3;
    box-shadow: 0 3px 8px rgba(10, 42, 87, 0.07);
}

.faq-item.is-active {
    box-shadow: 0 2px 6px rgba(10, 42, 87, 0.06);
}

/* Accordion Trigger Button: Min-H: 58px, px: 20px, py: 16px */
.faq-trigger {
    width: 100%;
    min-height: 58px;
    padding: 16px 20px;
    box-sizing: border-box;
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 14px;
    background-color: #FFFFFF;
    border: none;
    cursor: pointer;
    text-align: left;
    transition: background-color 0.15s ease;
}

.faq-trigger:hover {
    background-color: #FAFAFA;
}

/* Question: Poppins 600, 14px / 20px, #0A2A57 */
.faq-question {
    font-family: 'Poppins', sans-serif;
    font-weight: 600;
    font-size: 14px;
    line-height: 20px;
    letter-spacing: 0;
    color: #0A2A57;
    margin: 0;
}

/* Plus/Minus Icon: #FB7D0B */
.faq-icon {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    color: #FB7D0B;
    font-weight: 700;
    font-size: 20px;
    line-height: 1;
    width: 20px;
    height: 20px;
    flex-shrink: 0;
    user-select: none;
}

/* Answer Collapse Container */
.faq-collapse {
    overflow: hidden;
}

/* Answer Paragraph: Poppins 400, 13px / 21px, #53627A, px: 20px, py: 14px, border-t */
.faq-answer {
    font-family: 'Poppins', sans-serif;
    font-weight: 400;
    font-size: 13px;
    line-height: 21px;
    letter-spacing: 0;
    color: #53627A;
    margin: 0;
    padding: 14px 20px;
    border-top: 1px solid #F1F4F9;
    box-sizing: border-box;
    background-color: #FFFFFF;
}

@media (max-width: 640px) {
    .faq-section {
        padding-top: 40px;
        padding-bottom: 44px;
    }

    .faq-header {
        margin-bottom: 24px;
    }

    .faq-title {
        font-size: 22px;
        line-height: 28px;
    }

    .faq-subtitle {
        font-size: 13px;
        line-height: 20px;
    }

    .faq-trigger {
        min-height: 52px;
        padding: 14px 16px;
    }

    .faq-question {
        font-size: 13.5px;
        line-height: 19px;
    }

    .faq-answer {
        font-size: 12.5px;
        line-height: 20px;
        padding: 12px 16px;
    }
}
</style>
