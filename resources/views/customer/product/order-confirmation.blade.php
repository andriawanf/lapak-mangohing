<x-guest-layout>
    <section
        class="relative z-0 w-full pt-12 pb-12 min-h-fit lg:min-h-fit lg:pb-16 lg:pt-16 isolate bg-background food-pattern">
        <div class="max-w-screen-xl px-4 mx-auto sm:px-6 lg:px-8">
            <div class="px-4 mx-auto ">
                <h2 class="text-xl font-semibold text-tertiary sm:text-2xl mb-2">Thanks for your order!
                </h2>
                <p class="text-tertiary/50 mb-6 md:mb-8">Your order <a href="#"
                        class="font-medium text-primary hover:underline">#{{ $orders->order_number }}</a> will be
                    processed
                    within 24 hours during working days. We will notify you by email once your order has been shipped.
                </p>
                <div class="space-y-4 sm:space-y-2 rounded-lg border border-gray-100 bg-white p-6 mb-6 md:mb-8">
                    <dl class="sm:flex items-center justify-between gap-4">
                        <dt class="font-normal mb-1 sm:mb-0 text-tertiary/50">Date</dt>
                        <dd class="font-medium text-tertiary sm:text-end">{{ $payment->created_at }}</dd>
                    </dl>
                    <dl class="sm:flex items-center justify-between gap-4">
                        <dt class="font-normal mb-1 sm:mb-0 text-tertiary/50">Payment Method</dt>
                        <dd class="font-medium text-tertiary sm:text-end">JPMorgan monthly installments
                        </dd>
                    </dl>
                    <dl class="sm:flex items-center justify-between gap-4">
                        <dt class="font-normal mb-1 sm:mb-0 text-tertiary/50">Name</dt>
                        <dd class="font-medium text-tertiary sm:text-end">{{ $payment->customer_name }}</dd>
                    </dl>
                    <dl class="sm:flex items-center justify-between gap-4">
                        <dt class="font-normal mb-1 sm:mb-0 text-tertiary/50">Address</dt>
                        <dd class="font-medium text-tertiary sm:text-end">{{ $orders->customer_address }}</dd>
                    </dl>
                    <dl class="sm:flex items-center justify-between gap-4">
                        <dt class="font-normal mb-1 sm:mb-0 text-tertiary/50">Status</dt>
                        <dd class="font-medium text-tertiary sm:text-end">{{ $payment->payment_status }}</dd>
                    </dl>
                </div>
                <div class="flex items-center space-x-4">
                    <a href="#"
                        class="text-white bg-primary hover:bg-red-800 focus:ring-0 focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 focus:outline-none ">Track
                        your order</a>
                    <a href="#"
                        class="py-2.5 px-5 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-primary-700 focus:z-10 focus:ring-0 focus:ring-gray-100">Return
                        to shopping</a>
                </div>
            </div>
        </div>
    </section>

    {{-- footer --}}
    <livewire:customer.components.footer />
</x-guest-layout>
