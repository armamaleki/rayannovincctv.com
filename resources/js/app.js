import swal from 'sweetalert2';

window.Swal = swal;
import Swal from 'sweetalert2';
import './typewrite.js'

// import { createInertiaApp } from '@inertiajs/react';
// import { resolvePageComponent } from 'laravel-vite-plugin/inertia-helpers';
// import { createRoot } from 'react-dom/client';

// const appName = import.meta.env.VITE_APP_NAME || 'Laravel';
//
// createInertiaApp({
//     title: (title) => title ? `${title} - ${appName}` : appName,
//     resolve: (name) => resolvePageComponent(`./pages/${name}.tsx`, import.meta.glob('./pages/**/*.tsx')),
//     setup({ el, App, props }) {
//         const root = createRoot(el);
//
//         root.render(<App {...props} />);
//     },
//     progress: {
//         color: '#4B5563',
//     },
// });

document.addEventListener('alert', event => {
    const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true,
        didOpen: (toast) => {
            toast.addEventListener('mouseenter', Swal.stopTimer)
            toast.addEventListener('mouseleave', Swal.resumeTimer)
        }
    })
    Toast.fire({
        icon: event.detail[0].icon,
        title: event.detail[0].message,
    })
});

document.addEventListener('success' , event=>{
    Swal.fire({
        title: "محصول به سبد خرید اضافه شد.",
        icon: "success",
        html: `به سبد خرید میرید و یا میخوایید به خرید ادامه بدین؟ `,
        showCloseButton: true,
        showCancelButton: true,
        focusConfirm: false,
        confirmButtonText: `<a href="/checkout">ادامه روند خرید</a>`,
        cancelButtonText: "هنوز کار دارم",
    });
})


