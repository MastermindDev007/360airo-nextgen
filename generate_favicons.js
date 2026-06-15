import sharp from 'sharp';
import fs from 'fs';
import path from 'path';
import { fileURLToPath } from 'url';

const __filename = fileURLToPath(import.meta.url);
const __dirname = path.dirname(__filename);

const svgPath = path.join(__dirname, 'public', 'favicon.svg');
const publicDir = path.join(__dirname, 'public');

const sizes = [
    { name: 'favicon-16x16.png', size: 16 },
    { name: 'favicon-32x32.png', size: 32 },
    { name: 'apple-touch-icon.png', size: 180 },
    { name: 'android-chrome-192x192.png', size: 192 },
    { name: 'android-chrome-512x512.png', size: 512 }
];

async function generateFavicons() {
    try {
        console.log('Generating favicons...');
        for (const s of sizes) {
            await sharp(svgPath)
                .resize(s.size, s.size)
                .png()
                .toFile(path.join(publicDir, s.name));
            console.log(`Generated ${s.name}`);
        }
        
        // Use the 32x32 for favicon.ico as a simple fallback
        // (A true .ico contains multiple resolutions, but copying the 32x32 png as .ico works for modern browsers that fallback to it, or we just rely on .svg/.png).
        fs.copyFileSync(path.join(publicDir, 'favicon-32x32.png'), path.join(publicDir, 'favicon.ico'));
        console.log('Generated favicon.ico fallback');

        // Write site.webmanifest
        const manifest = {
            "name": "360Airo NextGen",
            "short_name": "360Airo",
            "icons": [
                {
                    "src": "/android-chrome-192x192.png",
                    "sizes": "192x192",
                    "type": "image/png"
                },
                {
                    "src": "/android-chrome-512x512.png",
                    "sizes": "512x512",
                    "type": "image/png"
                }
            ],
            "theme_color": "#6366f1",
            "background_color": "#09090b",
            "display": "standalone"
        };
        fs.writeFileSync(path.join(publicDir, 'site.webmanifest'), JSON.stringify(manifest, null, 2));
        console.log('Generated site.webmanifest');

        console.log('All favicons generated successfully!');
    } catch (error) {
        console.error('Error generating favicons:', error);
    }
}

generateFavicons();
