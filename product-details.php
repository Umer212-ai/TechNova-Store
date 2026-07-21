<?php
// product-details.php - TechNova Store Product Details Page

$products = [
  1 => [
    'name' => 'Nova Phone 15 Pro',
    'category' => 'Smartphones',
    'cat_slug' => 'smartphones',
    'brand' => 'TechNova',
    'sku' => 'TN-PH15P-256',
    'price' => ',099',
    'old_price' => ',299',
    'discount' => '-15%',
    'badge' => 'new',
    'rating' => 4.8,
    'reviews' => 342,
    'image' => 'https://images.unsplash.com/photo-1511707171634-5f897ff02aa9?auto=format&fit=crop&w=900&q=80',
    'thumbs' => [
      'https://images.unsplash.com/photo-1511707171634-5f897ff02aa9?auto=format&fit=crop&w=900&q=80',
      'https://images.unsplash.com/photo-1592899677977-9c10ca588bbd?auto=format&fit=crop&w=900&q=80',
      'https://images.unsplash.com/photo-1565849904461-04a58ad377e0?auto=format&fit=crop&w=900&q=80',
      'https://images.unsplash.com/photo-1580910051074-3eb694886fc3?auto=format&fit=crop&w=900&q=80',
    ],
    'desc' => 'The Nova Phone 15 Pro pushes the boundaries of mobile innovation. Featuring the all-new A20 Bionic chip, a pro-grade 48MP triple camera system, and an Ultra Retina XDR display.',
    'colors' => ['Space Black' => '#0b1020', 'Silver Titanium' => '#c0c0c0', 'Desert Gold' => '#c9a96e', 'Deep Blue' => '#1a3a6b'],
    'storages' => ['128 GB' => ',099', '256 GB' => ',199', '512 GB' => ',399', '1 TB' => ',599'],
    'specs_display' => [['Screen Size','6.7 inches'],['Resolution','2796 x 1290 pixels'],['Technology','Super Retina XDR OLED'],['Refresh Rate','120Hz ProMotion'],['Brightness','2000 nits (peak)']],
    'specs_performance' => [['Chipset','A20 Bionic'],['CPU','6-core'],['GPU','6-core'],['Neural Engine','16-core'],['RAM','8 GB']],
    'specs_camera' => [['Main','48 MP, f/1.78'],['Ultra Wide','12 MP, f/2.2'],['Telephoto','12 MP, 5x optical zoom'],['Front','12 MP TrueDepth'],['Video','4K @ 60fps']],
    'specs_other' => [['Battery','4,685 mAh'],['Charging','30W Wired, 15W MagSafe'],['Water Resistance','IP68'],['Weight','221 g'],['OS','iOS 19']],
    'detail_img' => 'https://images.unsplash.com/photo-1592899677977-9c10ca588bbd?auto=format&fit=crop&w=600&q=80',
    'about' => 'Powered by the A20 Bionic chip with 6-core CPU and 6-core GPU, this device handles everything from professional video editing to immersive gaming.',
    'about2' => 'The pro camera system features a 48MP Main camera, 12MP Ultra Wide, and 12MP Telephoto with 5x optical zoom.',
    'features' => [
      ['icon' => 'bi-camera-reels', 'title' => 'Pro Camera System', 'text' => '48MP triple-camera with Photonic Engine.'],
      ['icon' => 'bi-display', 'title' => 'Super Retina XDR', 'text' => '6.7 OLED with 120Hz ProMotion.'],
 ['icon' => 'bi-shield-lock', 'title' => 'Titanium Build', 'text' => 'Surgical-grade titanium frame.'],
 ['icon' => 'bi-cpu', 'title' => 'A20 Bionic Chip', 'text' => '6-core CPU & GPU with 16-core Neural Engine.'],
 ['icon' => 'bi-battery-charging', 'title' => 'All-Day Battery', 'text' => '4,685 mAh with 30W fast charging.'],
 ['icon' => 'bi-droplet', 'title' => 'IP68 Water Resistant', 'text' => 'Survives submersion up to 6 meters.'],
 ],
 ],
 2 => [
 'name' => 'Nova Book Air 14',
    'category' => 'Laptops',
    'cat_slug' => 'laptops',
    'brand' => 'TechNova',
    'sku' => 'TN-BA14-512',
    'price' => ',499',
    'old_price' => ',899',
    'discount' => '-20%',
    'badge' => 'sale',
    'rating' => 5.0,
    'reviews' => 521,
    'image' => 'https://images.unsplash.com/photo-1517336714731-489689fd1ca8?auto=format&fit=crop&w=900&q=80',
    'thumbs' => [
      'https://images.unsplash.com/photo-1517336714731-489689fd1ca8?auto=format&fit=crop&w=900&q=80',
      'https://images.unsplash.com/photo-1496181133206-80ce9b88a853?auto=format&fit=crop&w=900&q=80',
      'https://images.unsplash.com/photo-1611186871348-b1ce696e52c9?auto=format&fit=crop&w=900&q=80',
    ],
    'desc' => 'The Nova Book Air 14 redefines ultra-portable computing with a stunning Liquid Retina display, M3 chip performance, and 18-hour battery life.',
 'colors' => ['Midnight' => '#1a1a2e', 'Starlight' => '#f5e6d3', 'Space Gray' => '#6e6e73'],
 'storages' => ['256 GB' => ',299', '512 GB' => ',499', '1 TB' => ',799'],
 'specs_display' => [['Screen Size','14.2 inches'],['Resolution','2880 x 1864 pixels'],['Technology','Liquid Retina XDR'],['Refresh Rate','120Hz ProMotion'],['Brightness','1600 nits (peak)']],
 'specs_performance' => [['Chipset','Apple M3'],['CPU','8-core'],['GPU','10-core'],['Neural Engine','16-core'],['RAM','16 GB']],
 'specs_camera' => [['Front','1080p FaceTime HD'],['Video Support','Up to 6K external']],
 'specs_other' => [['Battery','Up to 18 hours'],['Charging','70W USB-C'],['Weight','1.24 kg'],['Ports','2x Thunderbolt 4, MagSafe'],['OS','macOS Sonoma']],
 'detail_img' => 'https://images.unsplash.com/photo-1496181133206-80ce9b88a853?auto=format&fit=crop&w=600&q=80',
 'about' => 'Featuring the next-generation M3 chip, the Nova Book Air delivers blazing-fast performance for everyday tasks and professional workloads.',
 'about2' => 'The Liquid Retina XDR display brings your content to life with extreme dynamic range and ProMotion technology.',
 'features' => [
 ['icon' => 'bi-cpu', 'title' => 'M3 Chip', 'text' => 'Next-gen 8-core CPU and 10-core GPU.'],
 ['icon' => 'bi-display', 'title' => 'Liquid Retina XDR', 'text' => '14.2 with ProMotion and 1600 nits.'],
      ['icon' => 'bi-battery-half', 'title' => '18-Hour Battery', 'text' => 'All-day battery life.'],
      ['icon' => 'bi-lightning', 'title' => 'Thunderbolt 4', 'text' => 'Ultra-fast data transfer.'],
      ['icon' => 'bi-speaker', 'title' => 'Spatial Audio', 'text' => 'Six-speaker Dolby Atmos.'],
      ['icon' => 'bi-weight', 'title' => 'Featherweight', 'text' => 'Just 1.24 kg.'],
    ],
  ],
  3 => [
    'name' => 'Nova Pods Pro',
    'category' => 'Audio',
    'cat_slug' => 'audio',
    'brand' => 'Pulse Audio',
    'sku' => 'TN-NPP-01',
    'price' => '',
    'old_price' => '',
    'discount' => '',
    'badge' => '',
    'rating' => 4.0,
    'reviews' => 198,
    'image' => 'https://images.unsplash.com/photo-1583394838336-acd977736f90?auto=format&fit=crop&w=900&q=80',
    'thumbs' => [
      'https://images.unsplash.com/photo-1583394838336-acd977736f90?auto=format&fit=crop&w=900&q=80',
      'https://images.unsplash.com/photo-1590658268037-6bf12f032f55?auto=format&fit=crop&w=900&q=80',
      'https://images.unsplash.com/photo-1606220588913-b3aacb4d2f46?auto=format&fit=crop&w=900&q=80',
    ],
    'desc' => 'Nova Pods Pro deliver next-level active noise cancellation, immersive spatial audio, and a seamless fit that stays comfortable all day.',
    'colors' => ['White' => '#ffffff', 'Black' => '#0b1020', 'Blue' => '#1a3a6b'],
    'storages' => ['Standard' => ''],
    'specs_display' => [],
    'specs_performance' => [['Driver','Custom high-excursion'],['Chip','H2 Audio'],['ANC','Active Noise Cancellation'],['Transparency','Adaptive Mode'],['EQ','Personalized Spatial Audio']],
    'specs_camera' => [],
    'specs_other' => [['Battery','6 hrs (30 hrs with case)'],['Charging','MagSafe, Qi, Lightning'],['Water Resistance','IPX4'],['Connectivity','Bluetooth 5.3'],['Weight','5.3 g per earbud']],
    'detail_img' => 'https://images.unsplash.com/photo-1590658268037-6bf12f032f55?auto=format&fit=crop&w=600&q=80',
    'about' => 'The H2 chip powers next-level noise cancellation. A custom driver delivers rich, detailed sound.',
    'about2' => 'Personalized Spatial Audio dynamically tracks your head movement for an immersive listening experience.',
    'features' => [
      ['icon' => 'bi-headphones', 'title' => 'Active Noise Cancellation', 'text' => 'H2 chip blocks outside noise.'],
      ['icon' => 'bi-music-note-beamed', 'title' => 'Spatial Audio', 'text' => 'Dynamic head tracking.'],
      ['icon' => 'bi-hand-index', 'title' => 'Touch Control', 'text' => 'Swipe, press, and squeeze controls.'],
      ['icon' => 'bi-droplet', 'title' => 'IPX4 Water Resistant', 'text' => 'Sweat and water resistant.'],
      ['icon' => 'bi-battery-charging', 'title' => '30-Hour Total Battery', 'text' => '6 hrs + 24 hrs from case.'],
      ['icon' => 'bi-phone', 'title' => 'Seamless Switching', 'text' => 'Auto-switches between devices.'],
    ],
  ],
  4 => [
    'name' => 'Nova Watch Ultra',
    'category' => 'Wearables',
    'cat_slug' => 'wearables',
    'brand' => 'TechNova',
    'sku' => 'TN-WU-49',
    'price' => '',
    'old_price' => '',
    'discount' => '-14%',
    'badge' => 'hot',
    'rating' => 4.5,
    'reviews' => 276,
    'image' => 'https://images.unsplash.com/photo-1546868871-7041f2a55e12?auto=format&fit=crop&w=900&q=80',
    'thumbs' => [
      'https://images.unsplash.com/photo-1546868871-7041f2a55e12?auto=format&fit=crop&w=900&q=80',
      'https://images.unsplash.com/photo-1434493789847-2f02dc6ca35d?auto=format&fit=crop&w=900&q=80',
      'https://images.unsplash.com/photo-1579586337278-3befd40fd17a?auto=format&fit=crop&w=900&q=80',
    ],
    'desc' => 'The Nova Watch Ultra is the most capable watch ever. 49mm titanium case, precision dual-frequency GPS, 36 hours battery, 100m water resistance.',
    'colors' => ['Titanium' => '#c0c0c0', 'Orange' => '#e67e22', 'Midnight' => '#1a1a2e'],
    'storages' => ['GPS + Cellular' => '', 'GPS + Cellular + Sport Band' => ''],
    'specs_display' => [],
    'specs_performance' => [['Chip','S9 SiP'],['Display','49mm Always-On Retina LTPO'],['Brightness','3000 nits (peak)'],['Storage','64 GB'],['OS','watchOS 11']],
    'specs_camera' => [],
    'specs_other' => [['Battery','Up to 36 hours'],['Water Resistance','100 meters'],['Connectivity','GPS, LTE, UWB, Bluetooth 5.3'],['Sensors','Blood O2, ECG, Temperature, Depth'],['Weight','61.4 g']],
    'detail_img' => 'https://images.unsplash.com/photo-1434493789847-2f02dc6ca35d?auto=format&fit=crop&w=600&q=80',
    'about' => 'The most rugged watch with a 49mm aerospace-grade titanium case and intuitive Action Button.',
    'about2' => 'Advanced health sensors track blood oxygen, ECG, and wrist temperature with precision dual-frequency GPS.',
    'features' => [
      ['icon' => 'bi-geo', 'title' => 'Precision GPS', 'text' => 'Dual-frequency L1 + L5 GPS.'],
      ['icon' => 'bi-heart-pulse', 'title' => 'Health Sensors', 'text' => 'Blood O2, ECG, temperature.'],
      ['icon' => 'bi-water', 'title' => '100m Water Proof', 'text' => 'Recreational diving to 40m.'],
      ['icon' => 'bi-battery-half', 'title' => '36-Hour Battery', 'text' => '72 hours in Low Power Mode.'],
      ['icon' => 'bi-bullseye', 'title' => 'Action Button', 'text' => 'Instant access to features.'],
      ['icon' => 'bi-phone', 'title' => 'Cellular Built-in', 'text' => 'Call and text without phone.'],
    ],
  ],
  5 => [
    'name' => 'Nova Cam 4K Pro',
    'category' => 'Cameras',
    'cat_slug' => 'cameras',
    'brand' => 'VisionX',
    'sku' => 'TN-CAM4K-PRO',
    'price' => '',
    'old_price' => '',
    'discount' => '',
    'badge' => '',
    'rating' => 4.0,
    'reviews' => 134,
    'image' => 'https://images.unsplash.com/photo-1558618666-fcd25c85f82e?auto=format&fit=crop&w=900&q=80',
    'thumbs' => [
      'https://images.unsplash.com/photo-1558618666-fcd25c85f82e?auto=format&fit=crop&w=900&q=80',
      'https://images.unsplash.com/photo-1516035069371-29a1b244cc32?auto=format&fit=crop&w=900&q=80',
      'https://images.unsplash.com/photo-1502920917128-1aa500764cbd?auto=format&fit=crop&w=900&q=80',
    ],
    'desc' => 'Professional-grade mirrorless camera with 33MP full-frame sensor, in-body stabilization, and 4K 120fps video.',
    'colors' => ['Black' => '#0b1020'],
    'storages' => ['Body Only' => '', 'With 24-70mm Lens' => ',299'],
    'specs_display' => [],
    'specs_performance' => [['Sensor','33MP Full-Frame BSI CMOS'],['ISO Range','100-51200'],['Autofocus','759-point Phase Detect'],['Stabilization','5-axis IBIS, 8 stops'],['Burst','10 fps']],
    'specs_camera' => [['Video','4K @ 120fps, 10-bit'],['Color Profiles','S-Log3, HLG'],['Slow Motion','1080p @ 240fps'],['EVF','9.44M-dot OLED'],['Screen','3.0 flip touchscreen']],
 'specs_other' => [['Battery','580 shots (LCD)'],['Card Slot','CFexpress + SD'],['Weight','658 g (body)'],['Weather Sealed','Yes'],['Connectivity','Wi-Fi 6, Bluetooth 5.0']],
 'detail_img' => 'https://images.unsplash.com/photo-1516035069371-29a1b244cc32?auto=format&fit=crop&w=600&q=80',
 'about' => 'The 33MP full-frame sensor delivers extraordinary resolution and low-light performance.',
 'about2' => 'Professional video: 4K at 120fps, 10-bit color depth, and S-Log3 for max dynamic range.',
 'features' => [
 ['icon' => 'bi-camera', 'title' => '33MP Full-Frame', 'text' => 'Back-illuminated sensor.'],
 ['icon' => 'bi-film', 'title' => '4K 120fps Video', 'text' => '10-bit color depth.'],
 ['icon' => 'bi-bullseye', 'title' => '759-Point AF', 'text' => '94% frame coverage.'],
 ['icon' => 'bi-shield-check', 'title' => '5-Axis IBIS', 'text' => '8 stops stabilization.'],
 ['icon' => 'bi-hdd', 'title' => 'Dual Card Slots', 'text' => 'CFexpress + SD.'],
 ['icon' => 'bi-phone', 'title' => 'Wi-Fi Transfer', 'text' => 'Instant phone transfer.'],
 ],
 ],
 6 => [
 'name' => 'Nova Hub Max',
 'category' => 'Smart Home',
 'cat_slug' => 'smart-home',
 'brand' => 'TechNova',
 'sku' => 'TN-HUB-MAX',
 'price' => '',
 'old_price' => '',
 'discount' => '-15%',
 'badge' => 'sale',
 'rating' => 5.0,
 'reviews' => 412,
 'image' => 'https://images.unsplash.com/photo-1558089687-f282ffcbc126?auto=format&fit=crop&w=900&q=80',
 'thumbs' => [
 'https://images.unsplash.com/photo-1558089687-f282ffcbc126?auto=format&fit=crop&w=900&q=80',
 'https://images.unsplash.com/photo-1558618047-3c8c76ca7e1e?auto=format&fit=crop&w=900&q=80',
 'https://images.unsplash.com/photo-1585771724684-38269d6639fd?auto=format&fit=crop&w=900&q=80',
 ],
 'desc' => 'The brain of your smart home. Control lights, locks, thermostats, and cameras from one beautiful 7 touchscreen.',
    'colors' => ['White' => '#ffffff', 'Charcoal' => '#333333'],
    'storages' => ['Standard' => ''],
    'specs_display' => [['Screen','7 IPS Touchscreen'],['Resolution','1024 x 600'],['Speakers','Dual 5W'],['Microphones','4-mic far-field array'],['Camera','12MP Ultra Wide']],
 'specs_performance' => [['Processor','Quad-core 1.8GHz'],['RAM','2 GB'],['Storage','16 GB'],['Wi-Fi','Wi-Fi 6'],['Thread','Border Router built-in']],
 'specs_camera' => [],
 'specs_other' => [['Protocols','Matter, Zigbee, Thread, Bluetooth'],['Voice Assistants','Alexa, Google, Siri'],['Power','15W adapter'],['Weight','420 g'],['Mounting','Desk or wall mount']],
 'detail_img' => 'https://images.unsplash.com/photo-1558618047-3c8c76ca7e1e?auto=format&fit=crop&w=600&q=80',
 'about' => 'A beautiful 7 touchscreen puts your entire smart home at your fingertips.',
    'about2' => 'Control over 100,000 compatible devices with Matter, Zigbee, and Thread support.',
    'features' => [
      ['icon' => 'bi-phone', 'title' => '7 Touchscreen', 'text' => 'HD display for home control.'],
 ['icon' => 'bi-house-gear', 'title' => 'Matter Support', 'text' => 'Future-proof connectivity.'],
 ['icon' => 'bi-mic', 'title' => 'Far-Field Mics', 'text' => '4-mic array.'],
 ['icon' => 'bi-camera-video', 'title' => '12MP Camera', 'text' => 'Video calls and monitoring.'],
 ['icon' => 'bi-person-workspace', 'title' => 'Multi-User', 'text' => 'Recognizes household members.'],
 ['icon' => 'bi-shield-lock', 'title' => 'Privacy Shutter', 'text' => 'Physical camera shutter.'],
 ],
 ],
 7 => [
 'name' => 'Nova Headphones Max',
 'category' => 'Audio',
 'cat_slug' => 'audio',
 'brand' => 'Pulse Audio',
 'sku' => 'TN-HM-01',
 'price' => '',
 'old_price' => '',
 'discount' => '',
 'badge' => 'new',
 'rating' => 4.5,
 'reviews' => 89,
 'image' => 'https://images.unsplash.com/photo-1505740420928-5e560c06d30e?auto=format&fit=crop&w=900&q=80',
 'thumbs' => [
 'https://images.unsplash.com/photo-1505740420928-5e560c06d30e?auto=format&fit=crop&w=900&q=80',
 'https://images.unsplash.com/photo-1583394838336-acd977736f90?auto=format&fit=crop&w=900&q=80',
 'https://images.unsplash.com/photo-1524678606370-a47ad25cb82a?auto=format&fit=crop&w=900&q=80',
 ],
 'desc' => 'Stunning high-fidelity audio with Active Noise Cancellation and a breathable knit mesh canopy for unmatched comfort.',
 'colors' => ['Silver' => '#c0c0c0', 'Space Gray' => '#6e6e73', 'Sky Blue' => '#87ceeb', 'Green' => '#14e0b3'],
 'storages' => ['Standard' => ''],
 'specs_display' => [],
 'specs_performance' => [['Driver','40mm custom'],['Chip','H1 (each ear cup)'],['ANC','Active Noise Cancellation'],['Transparency','Real-time'],['EQ','Computational audio, 9 filters']],
 'specs_camera' => [],
 'specs_other' => [['Battery','20 hours'],['Charging','Lightning'],['Weight','384.8 g'],['Connectivity','Bluetooth 5.0'],['Spatial Audio','Yes, with head tracking']],
 'detail_img' => 'https://images.unsplash.com/photo-1524678606370-a47ad25cb82a?auto=format&fit=crop&w=600&q=80',
 'about' => 'H1 chips in each cup deliver breakthrough sound quality with ANC and Transparency mode.',
 'about2' => 'Breathable knit mesh canopy and memory foam ear cushions create an exceptional acoustic seal.',
 'features' => [
 ['icon' => 'bi-headphones', 'title' => 'Hi-Fi Sound', 'text' => '40mm custom drivers.'],
 ['icon' => 'bi-volume-up', 'title' => 'Active Noise Cancellation', 'text' => 'H1 chip blocks outside.'],
 ['icon' => 'bi-ear', 'title' => 'Breathable Mesh', 'text' => 'All-day comfort.'],
 ['icon' => 'bi-dialpad', 'title' => 'Digital Crown', 'text' => 'Precise volume control.'],
 ['icon' => 'bi-music-note-beamed', 'title' => 'Spatial Audio', 'text' => 'Dolby Atmos with head tracking.'],
 ['icon' => 'bi-battery-half', 'title' => '20-Hour Battery', 'text' => 'All-day listening.'],
 ],
 ],
 8 => [
 'name' => 'Nova Book Pro 16',
    'category' => 'Laptops',
    'cat_slug' => 'laptops',
    'brand' => 'TechNova',
    'sku' => 'TN-BP16-M3X',
    'price' => ',199',
    'old_price' => '',
    'discount' => '',
    'badge' => '',
    'rating' => 5.0,
    'reviews' => 203,
    'image' => 'https://images.unsplash.com/photo-1606107557195-0e29a4b5b4aa?auto=format&fit=crop&w=900&q=80',
    'thumbs' => [
      'https://images.unsplash.com/photo-1606107557195-0e29a4b5b4aa?auto=format&fit=crop&w=900&q=80',
      'https://images.unsplash.com/photo-1517336714731-489689fd1ca8?auto=format&fit=crop&w=900&q=80',
      'https://images.unsplash.com/photo-1496181133206-80ce9b88a853?auto=format&fit=crop&w=900&q=80',
    ],
    'desc' => 'Desktop-class performance in a portable form. M3 Pro chip, 36 GB unified memory, and a stunning 16 Liquid Retina XDR display.',
 'colors' => ['Space Black' => '#0b1020', 'Silver' => '#c0c0c0'],
 'storages' => ['512 GB' => ',199', '1 TB' => ',499', '2 TB' => ',899'],
 'specs_display' => [['Screen Size','16.2 inches'],['Resolution','3456 x 2234 pixels'],['Technology','Liquid Retina XDR'],['Refresh Rate','120Hz ProMotion'],['Brightness','1600 nits (peak)']],
 'specs_performance' => [['Chipset','Apple M3 Pro'],['CPU','12-core'],['GPU','18-core'],['Neural Engine','16-core'],['RAM','36 GB unified']],
 'specs_camera' => [['Front','1080p FaceTime HD'],['Video Support','Up to 6K external']],
 'specs_other' => [['Battery','Up to 22 hours'],['Charging','140W USB-C'],['Weight','2.14 kg'],['Ports','3x Thunderbolt 4, HDMI, SD, MagSafe'],['OS','macOS Sonoma']],
 'detail_img' => 'https://images.unsplash.com/photo-1517336714731-489689fd1ca8?auto=format&fit=crop&w=600&q=80',
 'about' => 'M3 Pro with 12-core CPU and 18-core GPU handles the most demanding pro workflows.',
 'about2' => '16.2 Liquid Retina XDR display with 3456 x 2234 resolution and ProMotion.',
    'features' => [
      ['icon' => 'bi-cpu', 'title' => 'M3 Pro Chip', 'text' => '12-core CPU, 18-core GPU.'],
      ['icon' => 'bi-display', 'title' => '16.2 XDR Display', 'text' => 'ProMotion and 1600 nits.'],
 ['icon' => 'bi-memory', 'title' => '36 GB Unified Memory', 'text' => 'Handle massive projects.'],
 ['icon' => 'bi-battery-half', 'title' => '22-Hour Battery', 'text' => 'Longest in a Mac laptop.'],
 ['icon' => 'bi-hdmi', 'title' => 'Pro Ports', 'text' => 'Thunderbolt 4, HDMI, SD, MagSafe.'],
 ['icon' => 'bi-speaker', 'title' => 'Six-Speaker System', 'text' => 'Spatial Audio with Dolby Atmos.'],
 ],
 ],
 9 => [
 'name' => 'Nova Watch SE',
 'category' => 'Wearables',
 'cat_slug' => 'wearables',
 'brand' => 'TechNova',
 'sku' => 'TN-WSE-44',
 'price' => '',
 'old_price' => '',
 'discount' => '-14%',
 'badge' => 'hot',
 'rating' => 4.0,
 'reviews' => 167,
 'image' => 'https://images.unsplash.com/photo-1523275335684-37898b6baf30?auto=format&fit=crop&w=900&q=80',
 'thumbs' => [
 'https://images.unsplash.com/photo-1523275335684-37898b6baf30?auto=format&fit=crop&w=900&q=80',
 'https://images.unsplash.com/photo-1546868871-7041f2a55e12?auto=format&fit=crop&w=900&q=80',
 'https://images.unsplash.com/photo-1579586337278-3befd40fd17a?auto=format&fit=crop&w=900&q=80',
 ],
 'desc' => 'Essential smartwatch experience at an accessible price. Health monitoring, fitness tracking, and smart notifications.',
 'colors' => ['Midnight' => '#1a1a2e', 'Starlight' => '#f5e6d3', 'Silver' => '#c0c0c0'],
 'storages' => ['GPS' => '', 'GPS + Cellular' => ''],
 'specs_display' => [],
 'specs_performance' => [['Chip','S8 SiP'],['Display','44mm Always-On Retina'],['Brightness','1000 nits'],['Storage','32 GB'],['OS','watchOS 11']],
 'specs_camera' => [],
 'specs_other' => [['Battery','Up to 18 hours'],['Water Resistance','50 meters'],['Connectivity','GPS, LTE optional, Bluetooth 5.3'],['Sensors','Heart Rate, Accelerometer, Gyro'],['Weight','33 g']],
 'detail_img' => 'https://images.unsplash.com/photo-1546868871-7041f2a55e12?auto=format&fit=crop&w=600&q=80',
 'about' => 'Core health and fitness features in a lightweight, affordable package.',
 'about2' => 'Fall detection, crash detection, and Emergency SOS for peace of mind.',
 'features' => [
 ['icon' => 'bi-heart-pulse', 'title' => 'Heart Rate Monitor', 'text' => 'Continuous tracking.'],
 ['icon' => 'bi-activity', 'title' => 'Fitness Tracking', 'text' => 'Auto-detect workouts.'],
 ['icon' => 'bi-moon', 'title' => 'Sleep Tracking', 'text' => 'REM, Core, Deep sleep.'],
 ['icon' => 'bi-exclamation-triangle', 'title' => 'Safety Features', 'text' => 'Fall and crash detection.'],
 ['icon' => 'bi-phone', 'title' => 'Smart Notifications', 'text' => 'Calls, texts on wrist.'],
 ['icon' => 'bi-droplet', 'title' => '50m Water Resistant', 'text' => 'Swim-proof.'],
 ],
 ],
];

$id = isset($_GET['id']) ? (int)$_GET['id'] : 1;
if (!isset($products[$id])) $id = 1;
$p = $products[$id];

$stars_full = (int)$p['rating'];
$stars_half = ($p['rating'] - $stars_full) >= 0.5;
$stars_empty = 5 - $stars_full - ($stars_half ? 1 : 0);
?>
<?php include 'includes/header.php'; ?>
<body>

  <!-- ========== NAVBAR ========== -->
  <?php include 'includes/navbar.php'; ?>

  <!-- ========== PAGE HEADER / BREADCRUMB ========== -->
  <section class="tn-page-header">
    <div class="container">
      <nav aria-label="breadcrumb">
        <ol class="tn-breadcrumb">
          <li><a href="index.php">Home</a></li>
          <li><a href="products.php">Shop</a></li>
          <li><a href="products.php?cat=<?php echo $p['cat_slug']; ?>"><?php echo $p['category']; ?></a></li>
          <li class="active"><?php echo $p['name']; ?></li>
        </ol>
      </nav>
    </div>
  </section>

  <!-- ========== PRODUCT DETAILS ========== -->
  <section class="tn-section tn-pd">
    <div class="container">
      <div class="row g-5">

        <!-- ====== GALLERY ====== -->
        <div class="col-lg-6" data-tn-animate="fade-up">
          <div class="tn-pd-gallery">
            <div class="tn-pd-main" id="tnPdMain">
              <?php if ($p['badge']): ?>
                <span class="tn-badge tn-badge-<?php echo $p['badge']; ?>"><?php echo ucfirst($p['badge']); ?></span>
              <?php endif; ?>
              <img src="<?php echo $p['image']; ?>" alt="<?php echo $p['name']; ?>" id="tnPdMainImg" class="tn-pd-main-img" />
              <button class="tn-pd-zoom" aria-label="Zoom image"><i class="bi bi-arrows-fullscreen"></i></button>
            </div>
            <div class="tn-pd-thumbs" id="tnPdThumbs">
              <?php foreach ($p['thumbs'] as $index => $thumb): ?>
                <button class="tn-pd-thumb<?php echo $index === 0 ? ' active' : ''; ?>" data-img="<?php echo $thumb; ?>">
                  <img src="<?php echo str_replace('w=900', 'w=200', $thumb); ?>" alt="Thumb <?php echo $index + 1; ?>" />
                </button>
              <?php endforeach; ?>
            </div>
          </div>
        </div>

        <!-- ====== INFO ====== -->
        <div class="col-lg-6" data-tn-animate="fade-up">
          <div class="tn-pd-info">
            <span class="tn-product-cat"><?php echo $p['category']; ?></span>
            <h1 class="tn-pd-title"><?php echo $p['name']; ?></h1>

            <div class="tn-pd-meta">
              <div class="tn-product-rating">
                <?php for ($i = 0; $i < $stars_full; $i++): ?><i class="bi bi-star-fill"></i><?php endfor; ?>
                <?php if ($stars_half): ?><i class="bi bi-star-half"></i><?php endif; ?>
                <?php for ($i = 0; $i < $stars_empty; $i++): ?><i class="bi bi-star"></i><?php endfor; ?>
                <span>(<?php echo $p['reviews']; ?> reviews)</span>
              </div>
              <span class="tn-pd-sku">SKU: <?php echo $p['sku']; ?></span>
            </div>

            <div class="tn-pd-price-wrap">
              <span class="tn-pd-price"><?php echo $p['price']; ?></span>
              <?php if ($p['old_price']): ?>
                <span class="tn-price-old"><?php echo $p['old_price']; ?></span>
              <?php endif; ?>
              <?php if ($p['discount']): ?>
                <span class="tn-badge tn-badge-sale tn-pd-discount"><?php echo $p['discount']; ?></span>
              <?php endif; ?>
            </div>

            <p class="tn-pd-desc"><?php echo $p['desc']; ?></p>

            <!-- Color selector -->
            <div class="tn-pd-option">
              <h6>Color: <span id="tnPdColorVal"><?php echo array_key_first($p['colors']); ?></span></h6>
              <div class="tn-pd-colors" id="tnPdColors">
                <?php foreach ($p['colors'] as $colorName => $colorCode): ?>
                  <button class="tn-pd-color<?php echo $colorName === array_key_first($p['colors']) ? ' active' : ''; ?>" data-color="<?php echo $colorName; ?>" style="background:<?php echo $colorCode; ?>;" aria-label="<?php echo $colorName; ?>"></button>
                <?php endforeach; ?>
              </div>
            </div>

            <!-- Storage selector -->
            <div class="tn-pd-option">
              <h6>Option: <span id="tnPdStorageVal"><?php echo array_key_first($p['storages']); ?></span></h6>
              <div class="tn-pd-storages" id="tnPdStorages">
                <?php foreach ($p['storages'] as $storageName => $storagePrice): ?>
                  <button class="tn-pd-storage<?php echo $storageName === array_key_first($p['storages']) ? ' active' : ''; ?>" data-storage="<?php echo $storageName; ?>"><?php echo $storageName; ?> - <?php echo $storagePrice; ?></button>
                <?php endforeach; ?>
              </div>
            </div>

            <!-- Quantity + Actions -->
            <div class="tn-pd-actions">
              <div class="tn-pd-qty">
                <button class="tn-pd-qty-btn" id="tnQtyMinus" aria-label="Decrease quantity"><i class="bi bi-dash"></i></button>
                <input type="number" class="tn-pd-qty-input" id="tnQtyInput" value="1" min="1" max="10" aria-label="Quantity" />
                <button class="tn-pd-qty-btn" id="tnQtyPlus" aria-label="Increase quantity"><i class="bi bi-plus"></i></button>
              </div>
              <button class="btn tn-btn-primary tn-pd-btn-cart" id="tnAddToCart"><i class="bi bi-bag-plus me-2"></i> Add to Cart</button>
              <button class="btn tn-btn-ghost tn-pd-btn-buy"><i class="bi bi-lightning-charge me-2"></i> Buy Now</button>
              <button class="tn-pd-btn-wish" id="tnPdWishlist" aria-label="Add to wishlist"><i class="bi bi-heart"></i></button>
            </div>

            <!-- Trust signals -->
            <div class="tn-pd-trust">
              <div class="tn-pd-trust-item"><i class="bi bi-truck"></i><div><strong>Free Shipping</strong><span>Orders over $99</span></div></div>
              <div class="tn-pd-trust-item"><i class="bi bi-shield-check"></i><div><strong>2-Year Warranty</strong><span>Official guarantee</span></div></div>
              <div class="tn-pd-trust-item"><i class="bi bi-arrow-repeat"></i><div><strong>30-Day Returns</strong><span>No questions asked</span></div></div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- ========== SPECS / FEATURES TABS ========== -->
  <section class="tn-section tn-pd-tabs">
    <div class="container">
      <div class="tn-pd-tab-wrap" data-tn-animate="fade-up">
        <ul class="tn-pd-tabs-nav" id="tnPdTabs">
          <li class="active" data-tab="specs">Specifications</li>
          <li data-tab="features">Features</li>
          <li data-tab="reviews">Reviews (<?php echo $p['reviews']; ?>)</li>
        </ul>

        <!-- Specs Tab -->
        <div class="tn-pd-tab-content active" id="tab-specs">
          <div class="row g-3">
            <?php if (!empty($p['specs_display'])): foreach ($p['specs_display'] as $spec): ?>
              <div class="col-sm-6">
                <div class="tn-spec-row">
                  <span class="tn-spec-label"><?php echo $spec[0]; ?></span>
                  <span class="tn-spec-value"><?php echo $spec[1]; ?></span>
                </div>
              </div>
            <?php endforeach; endif; ?>
            <?php if (!empty($p['specs_performance'])): foreach ($p['specs_performance'] as $spec): ?>
              <div class="col-sm-6">
                <div class="tn-spec-row">
                  <span class="tn-spec-label"><?php echo $spec[0]; ?></span>
                  <span class="tn-spec-value"><?php echo $spec[1]; ?></span>
                </div>
              </div>
            <?php endforeach; endif; ?>
            <?php if (!empty($p['specs_camera'])): foreach ($p['specs_camera'] as $spec): ?>
              <div class="col-sm-6">
                <div class="tn-spec-row">
                  <span class="tn-spec-label"><?php echo $spec[0]; ?></span>
                  <span class="tn-spec-value"><?php echo $spec[1]; ?></span>
                </div>
              </div>
            <?php endforeach; endif; ?>
            <?php if (!empty($p['specs_other'])): foreach ($p['specs_other'] as $spec): ?>
              <div class="col-sm-6">
                <div class="tn-spec-row">
                  <span class="tn-spec-label"><?php echo $spec[0]; ?></span>
                  <span class="tn-spec-value"><?php echo $spec[1]; ?></span>
                </div>
              </div>
            <?php endforeach; endif; ?>
          </div>
        </div>

        <!-- Features Tab -->
        <div class="tn-pd-tab-content" id="tab-features">
          <div class="row g-3">
            <?php foreach ($p['features'] as $feature): ?>
              <div class="col-md-6">
                <div class="tn-feature-item">
                  <div class="tn-feature-icon"><i class="bi <?php echo $feature['icon']; ?>"></i></div>
                  <div>
                    <h6><?php echo $feature['title']; ?></h6>
                    <p><?php echo $feature['text']; ?></p>
                  </div>
                </div>
              </div>
            <?php endforeach; ?>
          </div>
        </div>

        <!-- Reviews Tab -->
        <div class="tn-pd-tab-content" id="tab-reviews">
          <div class="row g-4">
            <div class="col-md-4">
              <div class="tn-review-summary text-center">
                <div class="tn-review-score"><?php echo $p['rating']; ?></div>
                <div class="tn-product-rating">
                  <?php for ($i = 0; $i < $stars_full; $i++): ?><i class="bi bi-star-fill"></i><?php endfor; ?>
                  <?php if ($stars_half): ?><i class="bi bi-star-half"></i><?php endif; ?>
                  <?php for ($i = 0; $i < $stars_empty; $i++): ?><i class="bi bi-star"></i><?php endfor; ?>
                </div>
                <p class="mt-2"><?php echo $p['reviews']; ?> verified reviews</p>
              </div>
            </div>
            <div class="col-md-8">
              <?php 
              $sample_reviews = [
                ['name' => 'John D.', 'avatar' => 'JD', 'date' => '2 days ago', 'stars' => 5, 'title' => 'Excellent product!', 'text' => 'Absolutely love this product. Great quality and fast shipping.'],
                ['name' => 'Sarah M.', 'avatar' => 'SM', 'date' => '1 week ago', 'stars' => 4, 'title' => 'Very good', 'text' => 'Works as expected. Would recommend to others.'],
                ['name' => 'Mike R.', 'avatar' => 'MR', 'date' => '2 weeks ago', 'stars' => 5, 'title' => 'Perfect!', 'text' => 'Exactly what I was looking for. Amazing quality.'],
              ];
              foreach ($sample_reviews as $review): 
              ?>
                <div class="tn-review-card">
                  <div class="tn-review-header">
                    <div class="tn-review-avatar"><?php echo $review['avatar']; ?></div>
                    <div>
                      <h6 class="tn-review-name"><?php echo $review['name']; ?></h6>
                      <span class="tn-review-date"><?php echo $review['date']; ?></span>
                    </div>
                    <div class="tn-product-rating ms-auto">
                      <?php for ($i = 0; $i < $review['stars']; $i++): ?><i class="bi bi-star-fill"></i><?php endfor; ?>
                      <?php for ($i = $review['stars']; $i < 5; $i++): ?><i class="bi bi-star"></i><?php endfor; ?>
                    </div>
                  </div>
                  <h6 class="tn-review-title"><?php echo $review['title']; ?></h6>
                  <p class="tn-review-text"><?php echo $review['text']; ?></p>
                </div>
              <?php endforeach; ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- ========== RELATED PRODUCTS ========== -->
  <section class="tn-section">
    <div class="container">
      <div class="tn-section-head" data-tn-animate="fade-up">
        <h2>Related Products</h2>
        <span class="tn-section-line"></span>
      </div>
      <div class="row g-4">
        <?php $count = 0; foreach ($products as $relatedId => $related): ?>
          <?php if ($relatedId === $id || $count >= 4) continue; $count++; ?>
          <div class="col-sm-6 col-lg-3">
            <div class="tn-product-card" data-tn-animate="fade-up">
              <a href="product-details.php?id=<?php echo $relatedId; ?>" class="tn-card-link" aria-label="View <?php echo $related['name']; ?>"></a>
              <?php if ($related['badge']): ?>
                <span class="tn-badge tn-badge-<?php echo $related['badge']; ?>"><?php echo ucfirst($related['badge']); ?></span>
              <?php endif; ?>
              <div class="tn-product-media">
                <img src="<?php echo $related['image']; ?>" alt="<?php echo $related['name']; ?>" />
              </div>
              <div class="tn-product-body">
                <span class="tn-product-cat"><?php echo $related['category']; ?></span>
                <h5 class="tn-product-title"><a href="product-details.php?id=<?php echo $relatedId; ?>"><?php echo $related['name']; ?></a></h5>
                <div class="tn-product-price">
                  <span class="tn-price"><?php echo $related['price']; ?></span>
                  <?php if ($related['old_price']): ?>
                    <span class="tn-price-old"><?php echo $related['old_price']; ?></span>
                  <?php endif; ?>
                </div>
              </div>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

  <!-- ========== NEWSLETTER ========== -->
  <section class="tn-section tn-newsletter">
    <div class="container" data-tn-animate="fade-up">
      <h2>Stay in the Loop</h2>
      <p>Subscribe for exclusive deals, early access, and tech insights.</p>
      <form class="tn-newsletter-form" onsubmit="return false;">
        <input type="email" placeholder="Enter your email address" class="tn-newsletter-input" />
        <button type="submit" class="btn tn-btn-primary tn-newsletter-btn">Subscribe</button>
      </form>
    </div>
  </section>

  <!-- ========== FOOTER ========== -->
  <?php include 'includes/footer.php'; ?>

  <!-- Bootstrap 5 JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <!-- Main JS -->
  <script src="js/script.js"></script>
  <!-- Product Details page-specific JS -->
  <script>
    (function () {
      /* ---- Gallery ---- */
      var mainImg = document.getElementById('tnPdMainImg');
      var thumbs  = document.querySelectorAll('#tnPdThumbs .tn-pd-thumb');
      thumbs.forEach(function (btn) {
        btn.addEventListener('click', function () {
          thumbs.forEach(function (b) { b.classList.remove('active'); });
          btn.classList.add('active');
          mainImg.style.opacity = '0';
          setTimeout(function () { mainImg.src = btn.dataset.img; mainImg.style.opacity = '1'; }, 250);
        });
      });

      /* ---- Color selector ---- */
      var colorBtns = document.querySelectorAll('#tnPdColors .tn-pd-color');
      var colorVal  = document.getElementById('tnPdColorVal');
      colorBtns.forEach(function (btn) {
        btn.addEventListener('click', function () {
          colorBtns.forEach(function (b) { b.classList.remove('active'); });
          btn.classList.add('active');
          colorVal.textContent = btn.dataset.color;
        });
      });

      /* ---- Storage selector ---- */
      var storeBtns = document.querySelectorAll('#tnPdStorages .tn-pd-storage');
      var storeVal  = document.getElementById('tnPdStorageVal');
      storeBtns.forEach(function (btn) {
        btn.addEventListener('click', function () {
          storeBtns.forEach(function (b) { b.classList.remove('active'); });
          btn.classList.add('active');
          storeVal.textContent = btn.dataset.storage;
        });
      });

      /* ---- Quantity ---- */
      var qtyInput = document.getElementById('tnQtyInput');
      document.getElementById('tnQtyMinus').addEventListener('click', function () {
        var v = parseInt(qtyInput.value) || 1;
        if (v > 1) qtyInput.value = v - 1;
      });
      document.getElementById('tnQtyPlus').addEventListener('click', function () {
        var v = parseInt(qtyInput.value) || 1;
        if (v < 10) qtyInput.value = v + 1;
      });

      /* ---- Add to cart animation ---- */
      var addBtn = document.getElementById('tnAddToCart');
      addBtn.addEventListener('click', function () {
        addBtn.classList.add('tn-btn-loading');
        addBtn.innerHTML = '<i class="bi bi-check-lg me-1"></i> Added!';
        setTimeout(function () {
          addBtn.classList.remove('tn-btn-loading');
          addBtn.innerHTML = '<i class="bi bi-bag-plus me-2"></i> Add to Cart';
        }, 1800);
      });

      /* ---- Wishlist toggle ---- */
      var wishBtn = document.getElementById('tnPdWishlist');
      wishBtn.addEventListener('click', function () {
        var icon = wishBtn.querySelector('i');
        if (icon.classList.contains('bi-heart')) {
          icon.classList.replace('bi-heart', 'bi-heart-fill');
          wishBtn.classList.add('active');
        } else {
          icon.classList.replace('bi-heart-fill', 'bi-heart');
          wishBtn.classList.remove('active');
        }
      });

      /* ---- Tabs ---- */
      var tabBtns = document.querySelectorAll('#tnPdTabs li');
      var tabPanels = document.querySelectorAll('.tn-pd-tab-content');
      tabBtns.forEach(function (btn) {
        btn.addEventListener('click', function () {
          tabBtns.forEach(function (b) { b.classList.remove('active'); });
          tabPanels.forEach(function (p) { p.classList.remove('active'); });
          btn.classList.add('active');
          document.getElementById('tab-' + btn.dataset.tab).classList.add('active');
        });
      });
    })();
  </script>
</body>
</html>
