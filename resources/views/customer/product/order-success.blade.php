<x-guest-layout>
    <section
        class="relative z-0 w-full pt-12 pb-12 min-h-fit lg:min-h-screen lg:pb-16 lg:pt-16 isolate bg-background food-pattern">
        <div class="max-w-screen-xl px-4 mx-auto sm:px-6 lg:px-8">
            <div class="px-4 mx-auto ">
                <div class="max-w-2xl px-4 mx-auto 2xl:px-0">
                    <h2 class="mb-2 text-xl font-semibold text-tertiary sm:text-2xl">Thanks for your
                        order!</h2>
                    <p class="mb-6 text-tertiary/50 md:mb-8">Your order <a href="#"
                            class="font-medium text-tertiary hover:underline hover:text-primary">#{{ $orders->order_number }}</a>
                        will be
                        processed within 24 hours during working days. We will notify you by email once your order has
                        been shipped.</p>
                    <div class="p-6 mb-6 space-y-4 bg-white border border-gray-100 rounded-lg sm:space-y-2 md:mb-8">
                        <dl class="items-center justify-between gap-4 sm:flex">
                            <dt class="mb-1 font-normal text-tertiary/50 sm:mb-0 ">Date</dt>
                            <dd class="font-medium text-tertiary sm:text-end">{{ $payment->created_at }}</dd>
                        </dl>
                        <dl class="items-center justify-between gap-4 sm:flex">
                            <dt class="mb-1 font-normal text-tertiary/50 sm:mb-0 ">Payment Method</dt>
                            <dd class="font-medium text-tertiary sm:text-end">JPMorgan monthly
                                installments</dd>
                        </dl>
                        <dl class="items-center justify-between gap-4 sm:flex">
                            <dt class="mb-1 font-normal text-tertiary/50 sm:mb-0 ">Purchase Option</dt>
                            <dd class="font-medium uppercase text-tertiary sm:text-end">{{ $orders->purchase_option }}
                            </dd>
                        </dl>
                        <dl class="items-center justify-between gap-4 sm:flex">
                            <dt class="mb-1 font-normal text-tertiary/50 sm:mb-0 ">Name</dt>
                            <dd class="font-medium text-tertiary sm:text-end">{{ $orders->customer_name }}</dd>
                        </dl>
                        <dl class="items-start justify-between gap-4 sm:flex">
                            <dt class="mb-1 font-normal text-tertiary/50 sm:mb-0 ">Address</dt>
                            <dd class="font-medium text-tertiary sm:text-end w-96">{{ $orders->customer_address }},
                                <span class="uppercase">{{ $orders->customer_district }}</span>, <span
                                    class="uppercase">{{ $orders->customer_regency }}</span>, <span
                                    class="uppercase">{{ $orders->customer_province }}</span>, <span
                                    class="uppercase">{{ $orders->customer_country }}</span>, ID <span
                                    class="uppercase">{{ $orders->customer_postcode }}</span>
                            </dd>
                        </dl>
                        <dl class="items-center justify-between gap-4 sm:flex">
                            <dt class="mb-1 font-normal text-tertiary/50 sm:mb-0 ">Phone</dt>
                            <dd class="font-medium text-tertiary sm:text-end">+(62) {{ $orders->customer_phone }}</dd>
                        </dl>
                    </div>
                    <div class="flex items-center space-x-4">
                        <a href="#"
                            class="text-white bg-primary hover:bg-red-800 focus:ring-0 focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 focus:outline-none">Track
                            your order</a>
                        <a href="{{ route('product.collections') }}"
                            class="py-2.5 px-5 text-sm font-medium text-tertiary focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-primary focus:z-10 focus:ring-0 focus:ring-gray-100">Return
                            to shopping</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-guest-layout>