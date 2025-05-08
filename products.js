const products = {
    "backflip-strike": {
        id: "backflip-strike",
        name: "O'NEAL BACKFLIP STRIKE MTB HELMET",
        currentPrice: 2460.00,
        originalPrice: 4950.00,
        discount: 50, // Percentage
        category: "Helmet",
        brand: "O'Neal",
        reviews: {
            count: 0,
            averageRating: 0
        },
        colors: [
            { name: "All Black", code: "#000000", available: true },
            { name: "Black Yellow", code: "#FFC107", available: true, default: true },
            { name: "White Black", code: "#FFFFFF", available: true }
        ],
        sizes: [
            { size: "S", available: false },
            { size: "M", available: true },
            { size: "L", available: false },
            { size: "XL", available: true },
            { size: "2XL", available: true }
        ],
        mainImage: "assets/helmet-main.jpg",
        additionalImages: [
            "assets/helmet-angle1.jpg",
            "assets/helmet-angle2.jpg"
        ],
        description: "The O'Neal Backflip Strike MTB Helmet offers superior protection with its durable shell and comfortable fit, perfect for mountain biking enthusiasts.",
        pickupLocation: "ST Moto & Gears Warehouse",
        pickupTime: "Usually ready in 2-4 days"
    },
    
    "oneal-sierra-helmet": {
        id: "oneal-sierra-helmet",
        name: "O'NEAL SIERRA II ADVENTURE HELMET",
        currentPrice: 3950.00,
        originalPrice: 4500.00,
        discount: 12, // Percentage
        category: "Helmet",
        brand: "O'Neal",
        reviews: {
            count: 18,
            averageRating: 4.6
        },
        colors: [
            { name: "Matte Black", code: "#0A0A0A", available: true, default: true },
            { name: "Orange", code: "#FFA500", available: true },
            { name: "White/Red", code: "#FFFFFF", available: true }
        ],
        sizes: [
            { size: "S", available: true },
            { size: "M", available: true },
            { size: "L", available: true },
            { size: "XL", available: true },
            { size: "2XL", available: false }
        ],
        mainImage: "assets/oneal-sierra-main.jpg",
        additionalImages: [
            "assets/oneal-sierra-angle1.jpg",
            "assets/oneal-sierra-angle2.jpg"
        ],
        description: "The O'Neal Sierra II Adventure Helmet features a dual-sport design with integrated sun visor, multiple ventilation channels, and moisture-wicking liner for all-day comfort on or off-road.",
        pickupLocation: "ST Moto & Gears Warehouse",
        pickupTime: "Usually ready in 2-4 days"
    },
    
    "racing-jacket": {
        id: "racing-jacket",
        name: "ALPINESTARS RACING JACKET",
        currentPrice: 12500.00,
        originalPrice: 15000.00,
        discount: 17, // Percentage
        category: "Apparel",
        brand: "Alpinestars",
        reviews: {
            count: 12,
            averageRating: 4.5
        },
        colors: [
            { name: "Black Red", code: "#FF0000", available: true, default: true },
            { name: "Black Blue", code: "#0000FF", available: true },
            { name: "Black White", code: "#FFFFFF", available: false }
        ],
        sizes: [
            { size: "S", available: true },
            { size: "M", available: true },
            { size: "L", available: true },
            { size: "XL", available: false },
            { size: "2XL", available: false }
        ],
        mainImage: "assets/jacket-main.jpg",
        additionalImages: [
            "assets/jacket-angle1.jpg",
            "assets/jacket-angle2.jpg"
        ],
        description: "The Alpinestars Racing Jacket provides excellent protection and comfort for riders, featuring advanced materials and ventilation.",
        pickupLocation: "ST Moto & Gears Warehouse",
        pickupTime: "Usually ready in 3-5 days"
    },
    
    "riding-gloves": {
        id: "riding-gloves",
        name: "FOX RACING BOMBER GLOVES",
        currentPrice: 1200.00,
        originalPrice: 1500.00,
        discount: 20, // Percentage
        category: "Gloves",
        brand: "Fox Racing",
        reviews: {
            count: 28,
            averageRating: 4.8
        },
        colors: [
            { name: "Black", code: "#000000", available: true, default: true },
            { name: "Red", code: "#FF0000", available: true },
            { name: "Blue", code: "#0000FF", available: true }
        ],
        sizes: [
            { size: "S", available: true },
            { size: "M", available: true },
            { size: "L", available: true },
            { size: "XL", available: true }
        ],
        mainImage: "assets/gloves-main.jpg",
        additionalImages: [
            "assets/gloves-angle1.jpg",
            "assets/gloves-angle2.jpg"
        ],
        description: "Fox Racing Bomber Gloves offer excellent grip and protection for riders, with reinforced palms and ventilated design for comfort.",
        pickupLocation: "ST Moto & Gears Warehouse",
        pickupTime: "Usually ready in 1-2 days"
    },
    
    // New products - Helmets
    "shoei-gt-air": {
        id: "shoei-gt-air",
        name: "SHOEI GT-AIR II HELMET",
        currentPrice: 32500.00,
        originalPrice: 35000.00,
        discount: 7, // Percentage
        category: "Helmet",
        brand: "Shoei",
        reviews: {
            count: 42,
            averageRating: 4.9
        },
        colors: [
            { name: "Matte Black", code: "#0A0A0A", available: true, default: true },
            { name: "White", code: "#FFFFFF", available: true },
            { name: "Blue", code: "#000080", available: true }
        ],
        sizes: [
            { size: "S", available: true },
            { size: "M", available: true },
            { size: "L", available: true },
            { size: "XL", available: true }
        ],
        mainImage: "assets/shoei-main.jpg",
        additionalImages: [
            "assets/shoei-angle1.jpg",
            "assets/shoei-angle2.jpg"
        ],
        description: "The Shoei GT-Air II offers premium protection with advanced aerodynamics, integrated sun shield and superior ventilation system for long rides.",
        pickupLocation: "ST Moto & Gears Warehouse",
        pickupTime: "Usually ready in 1-3 days"
    },
    
    "agv-k6": {
        id: "agv-k6",
        name: "AGV K6 FULL FACE HELMET",
        currentPrice: 28750.00,
        originalPrice: 33000.00,
        discount: 13, // Percentage
        category: "Helmet",
        brand: "AGV",
        reviews: {
            count: 35,
            averageRating: 4.7
        },
        colors: [
            { name: "Matte Black", code: "#0A0A0A", available: true, default: true },
            { name: "Rossi Yellow", code: "#FFD700", available: true },
            { name: "Racing Red", code: "#B22222", available: true }
        ],
        sizes: [
            { size: "S", available: true },
            { size: "M", available: true },
            { size: "L", available: true },
            { size: "XL", available: false }
        ],
        mainImage: "assets/agv-main.jpg",
        additionalImages: [
            "assets/agv-angle1.jpg",
            "assets/agv-angle2.jpg"
        ],
        description: "The AGV K6 represents the pinnacle of AGV's helmet technology with its lightweight carbon-aramid shell, offering professional-grade protection and comfort.",
        pickupLocation: "ST Moto & Gears Warehouse",
        pickupTime: "Usually ready in 2-4 days"
    },
    
    // New products - Gloves
    "dainese-carbon": {
        id: "dainese-carbon",
        name: "DAINESE CARBON 3 SHORT GLOVES",
        currentPrice: 3800.00,
        originalPrice: 4500.00,
        discount: 16, // Percentage
        category: "Gloves",
        brand: "Dainese",
        reviews: {
            count: 19,
            averageRating: 4.6
        },
        colors: [
            { name: "Black/Red", code: "#800000", available: true, default: true },
            { name: "Black/White", code: "#FFFFFF", available: true },
            { name: "Black/Blue", code: "#000080", available: true }
        ],
        sizes: [
            { size: "S", available: true },
            { size: "M", available: true },
            { size: "L", available: true },
            { size: "XL", available: true },
            { size: "2XL", available: false }
        ],
        mainImage: "assets/dainese-gloves-main.jpg",
        additionalImages: [
            "assets/dainese-gloves-angle1.jpg",
            "assets/dainese-gloves-angle2.jpg"
        ],
        description: "Dainese Carbon 3 Short Gloves feature carbon fiber knuckle protection with goatskin construction for the perfect balance of protection and feel.",
        pickupLocation: "ST Moto & Gears Warehouse",
        pickupTime: "Usually ready in 2-3 days"
    },
    
    "revit-sand": {
        id: "revit-sand",
        name: "REV'IT SAND 4 ADVENTURE GLOVES",
        currentPrice: 4200.00,
        originalPrice: 4500.00,
        discount: 7, // Percentage
        category: "Gloves",
        brand: "Rev'it",
        reviews: {
            count: 24,
            averageRating: 4.5
        },
        colors: [
            { name: "Black", code: "#000000", available: true, default: true },
            { name: "Silver", code: "#C0C0C0", available: true },
            { name: "Sand", code: "#C2B280", available: true }
        ],
        sizes: [
            { size: "S", available: false },
            { size: "M", available: true },
            { size: "L", available: true },
            { size: "XL", available: true },
            { size: "2XL", available: true }
        ],
        mainImage: "assets/revit-gloves-main.jpg",
        additionalImages: [
            "assets/revit-gloves-angle1.jpg",
            "assets/revit-gloves-angle2.jpg"
        ],
        description: "Rev'it Sand 4 Adventure Gloves are designed for all-weather riding with waterproof and breathable materials, touchscreen compatibility, and robust impact protection.",
        pickupLocation: "ST Moto & Gears Warehouse",
        pickupTime: "Usually ready in 1-3 days"
    },
    
    // New products - Apparel
    "dainese-suit": {
        id: "dainese-suit",
        name: "DAINESE MISANO 2 D-AIR RACING SUIT",
        currentPrice: 75000.00,
        originalPrice: 85000.00,
        discount: 12, // Percentage
        category: "Apparel",
        brand: "Dainese",
        reviews: {
            count: 7,
            averageRating: 4.9
        },
        colors: [
            { name: "Black/Red", code: "#8B0000", available: true, default: true },
            { name: "Black/White", code: "#FFFFFF", available: true },
            { name: "Black/Yellow", code: "#FFD700", available: false }
        ],
        sizes: [
            { size: "48", available: true },
            { size: "50", available: true },
            { size: "52", available: true },
            { size: "54", available: true },
            { size: "56", available: false }
        ],
        mainImage: "assets/dainese-suit-main.jpg",
        additionalImages: [
            "assets/dainese-suit-angle1.jpg",
            "assets/dainese-suit-angle2.jpg"
        ],
        description: "The Dainese Misano 2 D-Air Racing Suit features an integrated airbag system that deploys in milliseconds upon detecting a crash, offering unparalleled protection for track riders.",
        pickupLocation: "ST Moto & Gears Warehouse",
        pickupTime: "Usually ready in 5-7 days"
    },
    
    "revit-pants": {
        id: "revit-pants",
        name: "REV'IT TORNADO 3 PANTS",
        currentPrice: 8500.00,
        originalPrice: 9800.00,
        discount: 13, // Percentage
        category: "Apparel",
        brand: "Rev'it",
        reviews: {
            count: 16,
            averageRating: 4.3
        },
        colors: [
            { name: "Black", code: "#000000", available: true, default: true },
            { name: "Silver", code: "#C0C0C0", available: true }
        ],
        sizes: [
            { size: "S", available: true },
            { size: "M", available: true },
            { size: "L", available: true },
            { size: "XL", available: true },
            { size: "2XL", available: true }
        ],
        mainImage: "assets/revit-pants-main.jpg",
        additionalImages: [
            "assets/revit-pants-angle1.jpg",
            "assets/revit-pants-angle2.jpg"
        ],
        description: "Rev'it Tornado 3 Pants offer excellent ventilation with abrasion-resistant materials and removable thermal liner, perfect for all-season riding.",
        pickupLocation: "ST Moto & Gears Warehouse",
        pickupTime: "Usually ready in 2-4 days"
    },
    
    "klim-jacket": {
        id: "klim-jacket",
        name: "KLIM BADLANDS PRO ADVENTURE JACKET",
        currentPrice: 25000.00,
        originalPrice: 28000.00,
        discount: 11, // Percentage
        category: "Apparel",
        brand: "Klim",
        reviews: {
            count: 32,
            averageRating: 4.8
        },
        colors: [
            { name: "Gray", code: "#808080", available: true, default: true },
            { name: "Black", code: "#000000", available: true },
            { name: "Hi-Vis", code: "#FFFF00", available: true }
        ],
        sizes: [
            { size: "S", available: true },
            { size: "M", available: true },
            { size: "L", available: true },
            { size: "XL", available: true },
            { size: "2XL", available: true },
            { size: "3XL", available: false }
        ],
        mainImage: "assets/klim-jacket-main.jpg",
        additionalImages: [
            "assets/klim-jacket-angle1.jpg",
            "assets/klim-jacket-angle2.jpg"
        ],
        description: "The Klim Badlands Pro is the ultimate adventure riding jacket with GORE-TEX weatherproofing, Klimatek cooling system, and D3O armor for maximum protection in any environment.",
        pickupLocation: "ST Moto & Gears Warehouse",
        pickupTime: "Usually ready in 3-5 days"
    },
    
    // New products - Parts
    "akrapovic-exhaust": {
        id: "akrapovic-exhaust",
        name: "AKRAPOVIČ SLIP-ON EXHAUST",
        currentPrice: 42000.00,
        originalPrice: 45000.00,
        discount: 7, // Percentage
        category: "Parts",
        brand: "Akrapovič",
        reviews: {
            count: 38,
            averageRating: 4.9
        },
        compatibility: [
            "Kawasaki Z900",
            "Kawasaki Ninja ZX-10R",
            "Yamaha MT-09"
        ],
        mainImage: "assets/akrapovic-main.jpg",
        additionalImages: [
            "assets/akrapovic-angle1.jpg",
            "assets/akrapovic-angle2.jpg"
        ],
        description: "The Akrapovič Slip-On Exhaust System delivers enhanced performance with a weight reduction, improved sound, and a sleek titanium finish that stands out.",
        pickupLocation: "ST Moto & Gears Warehouse",
        pickupTime: "Usually ready in 3-5 days"
    },
    
    "brembo-brakes": {
        id: "brembo-brakes",
        name: "BREMBO GP4-RX RADIAL BRAKE CALIPERS",
        currentPrice: 38500.00,
        originalPrice: 40000.00,
        discount: 4, // Percentage
        category: "Parts",
        brand: "Brembo",
        reviews: {
            count: 15,
            averageRating: 4.7
        },
        compatibility: [
            "Universal (requires appropriate mounting bracket)"
        ],
        colors: [
            { name: "Red", code: "#FF0000", available: true, default: true },
            { name: "Black", code: "#000000", available: true },
            { name: "Gold", code: "#FFD700", available: true }
        ],
        mainImage: "assets/brembo-main.jpg",
        additionalImages: [
            "assets/brembo-angle1.jpg",
            "assets/brembo-angle2.jpg"
        ],
        description: "Brembo GP4-RX calipers offer race-derived technology with improved heat management and braking performance for high-performance motorcycles.",
        pickupLocation: "ST Moto & Gears Warehouse",
        pickupTime: "Usually ready in 5-7 days"
    },
    
    // New products - Accessories
    "gopro-mount": {
        id: "gopro-mount",
        name: "RAM MOUNTS X-GRIP HANDLEBAR CAMERA MOUNT",
        currentPrice: 3800.00,
        originalPrice: 4200.00,
        discount: 10, // Percentage
        category: "Accessories",
        brand: "RAM Mounts",
        reviews: {
            count: 47,
            averageRating: 4.6
        },
        compatibility: [
            "Universal handlebar mount",
            "Compatible with GoPro, action cameras"
        ],
        mainImage: "assets/ram-mount-main.jpg",
        additionalImages: [
            "assets/ram-mount-angle1.jpg",
            "assets/ram-mount-angle2.jpg"
        ],
        description: "The RAM Mounts X-Grip provides secure mounting for your action camera or phone with vibration-dampening design and adjustable positioning.",
        pickupLocation: "ST Moto & Gears Warehouse",
        pickupTime: "Usually ready in 1-2 days"
    },
    
    "sena-headset": {
        id: "sena-headset",
        name: "SENA 50S BLUETOOTH COMMUNICATION SYSTEM",
        currentPrice: 15500.00,
        originalPrice: 17000.00,
        discount: 9, // Percentage
        category: "Accessories",
        brand: "Sena",
        reviews: {
            count: 64,
            averageRating: 4.8
        },
        mainImage: "assets/sena-main.jpg",
        additionalImages: [
            "assets/sena-angle1.jpg",
            "assets/sena-angle2.jpg"
        ],
        description: "The Sena 50S offers crystal-clear communications with mesh intercom technology, voice commands, and HD audio for up to 2km range and connects with up to 24 riders.",
        pickupLocation: "ST Moto & Gears Warehouse",
        pickupTime: "Usually ready in 1-3 days"
    },
    
    "tankbag-magnetic": {
        id: "tankbag-magnetic",
        name: "GIVI EA102B EASY-T MAGNETIC TANK BAG",
        currentPrice: 4800.00,
        originalPrice: 5500.00,
        discount: 13, // Percentage
        category: "Accessories",
        brand: "Givi",
        reviews: {
            count: 29,
            averageRating: 4.5
        },
        mainImage: "assets/givi-tankbag-main.jpg",
        additionalImages: [
            "assets/givi-tankbag-angle1.jpg",
            "assets/givi-tankbag-angle2.jpg"
        ],
        description: "The Givi EA102B Easy-T Tank Bag features strong magnetic attachments with anti-scratch base, expandable storage, and smartphone pocket for convenient access.",
        pickupLocation: "ST Moto & Gears Warehouse",
        pickupTime: "Usually ready in 2-3 days"
    },
    
    // New products - Maintenance
    "motul-oil": {
        id: "motul-oil",
        name: "MOTUL 7100 4T 10W-40 SYNTHETIC OIL",
        currentPrice: 950.00,
        originalPrice: 1100.00,
        discount: 14, // Percentage
        category: "Maintenance",
        brand: "Motul",
        reviews: {
            count: 83,
            averageRating: 4.9
        },
        volume: "1 Liter",
        mainImage: "assets/motul-oil-main.jpg",
        additionalImages: [
            "assets/motul-oil-angle1.jpg"
        ],
        description: "Motul 7100 4T 10W-40 is a full synthetic oil designed for high-performance motorcycles, offering superior engine protection and smooth shifting.",
        pickupLocation: "ST Moto & Gears Warehouse",
        pickupTime: "Usually ready in 1 day"
    },
    
    "chain-kit": {
        id: "chain-kit",
        name: "DID VX3 CHAIN & SPROCKET KIT",
        currentPrice: 7800.00,
        originalPrice: 8500.00,
        discount: 8, // Percentage
        category: "Maintenance",
        brand: "DID",
        reviews: {
            count: 42,
            averageRating: 4.7
        },
        compatibility: [
            "Honda CBR650R",
            "Kawasaki Z650",
            "Yamaha MT-07",
            "Suzuki GSX-R750"
        ],
        mainImage: "assets/did-chain-main.jpg",
        additionalImages: [
            "assets/did-chain-angle1.jpg",
            "assets/did-chain-angle2.jpg"
        ],
        description: "The DID VX3 Chain & Sprocket Kit provides superior strength and durability with X-ring technology for extended life and less maintenance.",
        pickupLocation: "ST Moto & Gears Warehouse",
        pickupTime: "Usually ready in 2-3 days"
    },
    
    "oxford-stand": {
        id: "oxford-stand",
        name: "OXFORD PADDOCK STAND",
        currentPrice: 6200.00,
        originalPrice: 6500.00,
        discount: 5, // Percentage
        category: "Maintenance",
        brand: "Oxford",
        reviews: {
            count: 36,
            averageRating: 4.6
        },
        mainImage: "assets/oxford-stand-main.jpg",
        additionalImages: [
            "assets/oxford-stand-angle1.jpg",
            "assets/oxford-stand-angle2.jpg"
        ],
        description: "The Oxford Paddock Stand provides stable support for maintenance tasks with a robust steel construction that handles up to 300kg.",
        pickupLocation: "ST Moto & Gears Warehouse",
        pickupTime: "Usually ready in 2-4 days"
    },
    
    // Additional products to reach 50 items
    
    // More Helmets
    "arai-rxv": {
        id: "arai-rxv",
        name: "ARAI RX-V RACE HELMET",
        currentPrice: 39500.00,
        originalPrice: 42000.00,
        discount: 6, // Percentage
        category: "Helmet",
        brand: "Arai",
        reviews: {
            count: 28,
            averageRating: 4.9
        },
        colors: [
            { name: "Diamond White", code: "#FFFFFF", available: true, default: true },
            { name: "Frost Black", code: "#0A0A0A", available: true },
            { name: "Race Blue", code: "#0000CD", available: true }
        ],
        sizes: [
            { size: "XS", available: true },
            { size: "S", available: true },
            { size: "M", available: true },
            { size: "L", available: true },
            { size: "XL", available: true }
        ],
        mainImage: "assets/arai-rxv-main.jpg",
        additionalImages: [
            "assets/arai-rxv-angle1.jpg",
            "assets/arai-rxv-angle2.jpg"
        ],
        description: "The Arai RX-V Race Helmet represents the pinnacle of track protection with its PB-SNC2 shell and advanced ventilation system designed for high-speed racing.",
        pickupLocation: "ST Moto & Gears Warehouse",
        pickupTime: "Usually ready in 3-5 days"
    },
    
    "bell-qualifier": {
        id: "bell-qualifier",
        name: "BELL QUALIFIER DLX MIPS HELMET",
        currentPrice: 12500.00,
        originalPrice: 15000.00,
        discount: 17, // Percentage
        category: "Helmet",
        brand: "Bell",
        reviews: {
            count: 45,
            averageRating: 4.5
        },
        colors: [
            { name: "Matte Black", code: "#0A0A0A", available: true, default: true },
            { name: "Gloss White", code: "#FFFFFF", available: true },
            { name: "Hi-Vis Yellow", code: "#FFFF00", available: true }
        ],
        sizes: [
            { size: "S", available: true },
            { size: "M", available: true },
            { size: "L", available: true },
            { size: "XL", available: true }
        ],
        mainImage: "assets/bell-qualifier-main.jpg",
        additionalImages: [
            "assets/bell-qualifier-angle1.jpg",
            "assets/bell-qualifier-angle2.jpg"
        ],
        description: "The Bell Qualifier DLX MIPS Helmet offers cutting-edge protection with Multi-directional Impact Protection System and includes a photochromic visor for all light conditions.",
        pickupLocation: "ST Moto & Gears Warehouse",
        pickupTime: "Usually ready in 2-3 days"
    },
    
    "hjc-rpha": {
        id: "hjc-rpha",
        name: "HJC RPHA 11 PRO HELMET",
        currentPrice: 21500.00,
        originalPrice: 24000.00,
        discount: 10, // Percentage
        category: "Helmet",
        brand: "HJC",
        reviews: {
            count: 37,
            averageRating: 4.7
        },
        colors: [
            { name: "Carbon Black", code: "#0A0A0A", available: true, default: true },
            { name: "Boba Fett Green", code: "#228B22", available: true },
            { name: "Venom Black/White", code: "#FFFFFF", available: true }
        ],
        sizes: [
            { size: "XS", available: true },
            { size: "S", available: true },
            { size: "M", available: true },
            { size: "L", available: true },
            { size: "XL", available: true }
        ],
        mainImage: "assets/hjc-rpha-main.jpg",
        additionalImages: [
            "assets/hjc-rpha-angle1.jpg",
            "assets/hjc-rpha-angle2.jpg"
        ],
        description: "The HJC RPHA 11 Pro features Premium Integrated Matrix Plus construction for lightweight strength with advanced ventilation and emergency quick-release cheek pads.",
        pickupLocation: "ST Moto & Gears Warehouse",
        pickupTime: "Usually ready in 2-4 days"
    },
    
    // More Gloves
    "alpinestars-sp8": {
        id: "alpinestars-sp8",
        name: "ALPINESTARS SP-8 V3 GLOVES",
        currentPrice: 3600.00,
        originalPrice: 4200.00,
        discount: 14, // Percentage
        category: "Gloves",
        brand: "Alpinestars",
        reviews: {
            count: 26,
            averageRating: 4.4
        },
        colors: [
            { name: "Black", code: "#000000", available: true, default: true },
            { name: "Black/White", code: "#FFFFFF", available: true },
            { name: "Black/Red", code: "#FF0000", available: true }
        ],
        sizes: [
            { size: "S", available: true },
            { size: "M", available: true },
            { size: "L", available: true },
            { size: "XL", available: true },
            { size: "2XL", available: true }
        ],
        mainImage: "assets/alpinestars-sp8-main.jpg",
        additionalImages: [
            "assets/alpinestars-sp8-angle1.jpg",
            "assets/alpinestars-sp8-angle2.jpg"
        ],
        description: "Alpinestars SP-8 V3 Gloves combine premium leather construction with TPR knuckle protection and touchscreen compatibility for everyday riding.",
        pickupLocation: "ST Moto & Gears Warehouse",
        pickupTime: "Usually ready in 1-3 days"
    },
    
    "alpinestars-gp-pro": {
        id: "alpinestars-gp-pro",
        name: "ALPINESTARS GP PRO R3 RACE GLOVES",
        currentPrice: 8900.00,
        originalPrice: 9500.00,
        discount: 6, // Percentage
        category: "Gloves",
        brand: "Alpinestars",
        reviews: {
            count: 19,
            averageRating: 4.8
        },
        colors: [
            { name: "Black", code: "#000000", available: true, default: true },
            { name: "Black/White/Red", code: "#FF0000", available: true },
            { name: "Black/White/Yellow", code: "#FFFF00", available: true }
        ],
        sizes: [
            { size: "S", available: true },
            { size: "M", available: true },
            { size: "L", available: true },
            { size: "XL", available: true },
            { size: "2XL", available: false }
        ],
        mainImage: "assets/alpinestars-gppro-main.jpg",
        additionalImages: [
            "assets/alpinestars-gppro-angle1.jpg",
            "assets/alpinestars-gppro-angle2.jpg"
        ],
        description: "Alpinestars GP Pro R3 Race Gloves feature premium kangaroo leather with advanced knuckle protection and patented finger bridge to prevent seam separation during impacts.",
        pickupLocation: "ST Moto & Gears Warehouse",
        pickupTime: "Usually ready in 2-4 days"
    },
    
    "knox-handroid": {
        id: "knox-handroid",
        name: "KNOX HANDROID MK4 GLOVES",
        currentPrice: 12300.00,
        originalPrice: 13500.00,
        discount: 9, // Percentage
        category: "Gloves",
        brand: "Knox",
        reviews: {
            count: 23,
            averageRating: 4.7
        },
        colors: [
            { name: "Black", code: "#000000", available: true, default: true },
            { name: "Black/White", code: "#FFFFFF", available: true },
            { name: "Black/Red", code: "#FF0000", available: true }
        ],
        sizes: [
            { size: "S", available: true },
            { size: "M", available: true },
            { size: "L", available: true },
            { size: "XL", available: true }
        ],
        mainImage: "assets/knox-handroid-main.jpg",
        additionalImages: [
            "assets/knox-handroid-angle1.jpg",
            "assets/knox-handroid-angle2.jpg"
        ],
        description: "The Knox Handroid MK4 features the innovative exoskeleton design with BOA closure system and SPS scaphoid protection system for ultimate hand safety.",
        pickupLocation: "ST Moto & Gears Warehouse",
        pickupTime: "Usually ready in 3-5 days"
    },
    
    // More Apparel
    "alpinestars-missile": {
        id: "alpinestars-missile",
        name: "ALPINESTARS MISSILE LEATHER PANTS",
        currentPrice: 18400.00,
        originalPrice: 21000.00,
        discount: 12, // Percentage
        category: "Apparel",
        brand: "Alpinestars",
        reviews: {
            count: 14,
            averageRating: 4.6
        },
        colors: [
            { name: "Black", code: "#000000", available: true, default: true },
            { name: "Black/White", code: "#FFFFFF", available: true }
        ],
        sizes: [
            { size: "48", available: true },
            { size: "50", available: true },
            { size: "52", available: true },
            { size: "54", available: true },
            { size: "56", available: true },
            { size: "58", available: false }
        ],
        mainImage: "assets/alpinestars-missile-main.jpg",
        additionalImages: [
            "assets/alpinestars-missile-angle1.jpg",
            "assets/alpinestars-missile-angle2.jpg"
        ],
        description: "Alpinestars Missile Leather Pants feature 1.3mm premium cowhide with strategically placed stretch panels and CE-approved armor for track and sport riding.",
        pickupLocation: "ST Moto & Gears Warehouse",
        pickupTime: "Usually ready in 3-5 days"
    },
    
    "dainese-air": {
        id: "dainese-air",
        name: "DAINESE AIR FRAME D1 TEXTILE JACKET",
        currentPrice: 11800.00,
        originalPrice: 13500.00,
        discount: 13, // Percentage
        category: "Apparel",
        brand: "Dainese",
        reviews: {
            count: 31,
            averageRating: 4.5
        },
        colors: [
            { name: "Black", code: "#000000", available: true, default: true },
            { name: "Black/Red", code: "#FF0000", available: true },
            { name: "Grey/Black", code: "#808080", available: true }
        ],
        sizes: [
            { size: "46", available: true },
            { size: "48", available: true },
            { size: "50", available: true },
            { size: "52", available: true },
            { size: "54", available: true },
            { size: "56", available: true }
        ],
        mainImage: "assets/dainese-air-main.jpg",
        additionalImages: [
            "assets/dainese-air-angle1.jpg",
            "assets/dainese-air-angle2.jpg"
        ],
        description: "The Dainese Air Frame D1 offers maximum airflow with its mesh construction and removable windproof liner, perfect for hot weather riding with CE Level 2 armor protection.",
        pickupLocation: "ST Moto & Gears Warehouse",
        pickupTime: "Usually ready in 2-4 days"
    },
    
    "revit-jacket": {
        id: "revit-jacket",
        name: "REV'IT DOMINATOR 3 GTX JACKET",
        currentPrice: 27800.00,
        originalPrice: 32000.00,
        discount: 13, // Percentage
        category: "Apparel",
        brand: "Rev'it",
        reviews: {
            count: 17,
            averageRating: 4.9
        },
        colors: [
            { name: "Dark Grey", code: "#A9A9A9", available: true, default: true },
            { name: "Black", code: "#000000", available: true }
        ],
        sizes: [
            { size: "S", available: true },
            { size: "M", available: true },
            { size: "L", available: true },
            { size: "XL", available: true },
            { size: "2XL", available: true },
            { size: "3XL", available: true }
        ],
        mainImage: "assets/revit-dominator-main.jpg",
        additionalImages: [
            "assets/revit-dominator-angle1.jpg",
            "assets/revit-dominator-angle2.jpg"
        ],
        description: "The Rev'it Dominator 3 GTX is the ultimate adventure jacket with Gore-Tex Pro Shell, multiple ventilation options, and SEEFLEX CE Level 2 armor for all weather conditions.",
        pickupLocation: "ST Moto & Gears Warehouse",
        pickupTime: "Usually ready in 3-6 days"
    },
    
    "icon-vest": {
        id: "icon-vest",
        name: "ICON HYPERSPORT PRIME VEST",
        currentPrice: 5800.00,
        originalPrice: 6500.00,
        discount: 11, // Percentage
        category: "Apparel",
        brand: "Icon",
        reviews: {
            count: 24,
            averageRating: 4.3
        },
        colors: [
            { name: "Black", code: "#000000", available: true, default: true },
            { name: "Hi-Vis", code: "#FFFF00", available: true }
        ],
        sizes: [
            { size: "S", available: true },
            { size: "M", available: true },
            { size: "L", available: true },
            { size: "XL", available: true },
            { size: "2XL", available: true }
        ],
        mainImage: "assets/icon-vest-main.jpg",
        additionalImages: [
            "assets/icon-vest-angle1.jpg",
            "assets/icon-vest-angle2.jpg"
        ],
        description: "The Icon Hypersport Prime Vest provides CE Level 2 back protection in a lightweight, breathable package that can be worn under or over your jacket.",
        pickupLocation: "ST Moto & Gears Warehouse",
        pickupTime: "Usually ready in 2-3 days"
    },
    
    // More Parts
    "yoshimura-exhaust": {
        id: "yoshimura-exhaust",
        name: "YOSHIMURA R-77 SLIP-ON EXHAUST",
        currentPrice: 28500.00,
        originalPrice: 32000.00,
        discount: 11, // Percentage
        category: "Parts",
        brand: "Yoshimura",
        reviews: {
            count: 41,
            averageRating: 4.8
        },
        compatibility: [
            "Honda CBR1000RR",
            "Suzuki GSX-R1000",
            "Kawasaki ZX-10R"
        ],
        mainImage: "assets/yoshimura-main.jpg",
        additionalImages: [
            "assets/yoshimura-angle1.jpg",
            "assets/yoshimura-angle2.jpg"
        ],
        description: "The Yoshimura R-77 Slip-On Exhaust delivers race-proven performance with a unique trapezoidal shape and carbon fiber end cap for weight savings and sound enhancement.",
        pickupLocation: "ST Moto & Gears Warehouse",
        pickupTime: "Usually ready in 3-5 days"
    },
    
    "ohlins-shock": {
        id: "ohlins-shock",
        name: "ÖHLINS STX 46 REAR SHOCK ABSORBER",
        currentPrice: 45000.00,
        originalPrice: 48000.00,
        discount: 6, // Percentage
        category: "Parts",
        brand: "Öhlins",
        reviews: {
            count: 26,
            averageRating: 4.9
        },
        compatibility: [
            "Ducati Panigale V4",
            "BMW S1000RR",
            "Yamaha R1"
        ],
        mainImage: "assets/ohlins-shock-main.jpg",
        additionalImages: [
            "assets/ohlins-shock-angle1.jpg",
            "assets/ohlins-shock-angle2.jpg"
        ],
        description: "The Öhlins STX 46 rear shock absorber provides superior handling with fully adjustable compression and rebound damping for track and street applications.",
        pickupLocation: "ST Moto & Gears Warehouse",
        pickupTime: "Usually ready in 5-7 days"
    },
    
    "rizoma-mirrors": {
        id: "rizoma-mirrors",
        name: "RIZOMA SPY-R MIRRORS",
        currentPrice: 7200.00,
        originalPrice: 8000.00,
        discount: 10, // Percentage
        category: "Parts",
        brand: "Rizoma",
        reviews: {
            count: 32,
            averageRating: 4.6
        },
        colors: [
            { name: "Black", code: "#000000", available: true, default: true },
            { name: "Silver", code: "#C0C0C0", available: true }
        ],
        compatibility: [
            "Universal (requires model-specific adapter)"
        ],
        mainImage: "assets/rizoma-mirrors-main.jpg",
        additionalImages: [
            "assets/rizoma-mirrors-angle1.jpg",
            "assets/rizoma-mirrors-angle2.jpg"
        ],
        description: "Rizoma Spy-R mirrors combine form and function with CNC-machined aluminum construction and anti-glare glass for optimal visibility and style.",
        pickupLocation: "ST Moto & Gears Warehouse",
        pickupTime: "Usually ready in 2-4 days"
    },
    
    "quickshifter-pro": {
        id: "quickshifter-pro",
        name: "DYNOJET POWER COMMANDER QUICKSHIFTER",
        currentPrice: 12500.00,
        originalPrice: 13800.00,
        discount: 9, // Percentage
        category: "Parts",
        brand: "Dynojet",
        reviews: {
            count: 29,
            averageRating: 4.7
        },
        compatibility: [
            "Compatible with Power Commander V",
            "Most modern sportbikes"
        ],
        mainImage: "assets/quickshifter-main.jpg",
        additionalImages: [
            "assets/quickshifter-angle1.jpg",
            "assets/quickshifter-angle2.jpg"
        ],
        description: "The Dynojet Power Commander Quickshifter enables clutchless upshifts with adjustable shift sensitivity and kill times for smoother, faster gear changes.",
        pickupLocation: "ST Moto & Gears Warehouse",
        pickupTime: "Usually ready in 3-5 days"
    },
    
    // More Accessories
    "cardo-packtalk": {
        id: "cardo-packtalk",
        name: "CARDO PACKTALK EDGE COMMUNICATION SYSTEM",
        currentPrice: 16500.00,
        originalPrice: 18000.00,
        discount: 8, // Percentage
        category: "Accessories",
        brand: "Cardo",
        reviews: {
            count: 38,
            averageRating: 4.7
        },
        mainImage: "assets/cardo-main.jpg",
        additionalImages: [
            "assets/cardo-angle1.jpg",
            "assets/cardo-angle2.jpg"
        ],
        description: "The Cardo Packtalk Edge features Dynamic Mesh Communication technology for connecting up to 15 riders with 2nd generation Natural Voice Operation and JBL speakers.",
        pickupLocation: "ST Moto & Gears Warehouse",
        pickupTime: "Usually ready in 2-3 days"
    },
    
    "kriega-backpack": {
        id: "kriega-backpack",
        name: "KRIEGA R25 BACKPACK",
        currentPrice: 8900.00,
        originalPrice: 9500.00,
        discount: 6, // Percentage
        category: "Accessories",
        brand: "Kriega",
        reviews: {
            count: 43,
            averageRating: 4.8
        },
        colors: [
            { name: "Black", code: "#000000", available: true, default: true }
        ],
        mainImage: "assets/kriega-backpack-main.jpg",
        additionalImages: [
            "assets/kriega-backpack-angle1.jpg",
            "assets/kriega-backpack-angle2.jpg"
        ],
        description: "The Kriega R25 features the innovative Quadloc harness system that transfers weight from shoulders to chest and waist with a 25-liter waterproof main compartment.",
        pickupLocation: "ST Moto & Gears Warehouse",
        pickupTime: "Usually ready in 2-3 days"
    },
    
    "oxford-heated-grips": {
        id: "oxford-heated-grips",
        name: "OXFORD PREMIUM ADVENTURE HEATED GRIPS",
        currentPrice: 3600.00,
        originalPrice: 4200.00,
        discount: 14, // Percentage
        category: "Accessories",
        brand: "Oxford",
        reviews: {
            count: 56,
            averageRating: 4.5
        },
        compatibility: [
            "Universal 22mm and 25mm handlebars"
        ],
        mainImage: "assets/oxford-grips-main.jpg",
        additionalImages: [
            "assets/oxford-grips-angle1.jpg",
            "assets/oxford-grips-angle2.jpg"
        ],
        description: "Oxford Premium Adventure Heated Grips offer 5 heat settings with intelligent battery management and water-resistant design for year-round comfort.",
        pickupLocation: "ST Moto & Gears Warehouse",
        pickupTime: "Usually ready in 1-2 days"
    },
    
    "quadlock-mount": {
        id: "quadlock-mount",
        name: "QUADLOCK MOTORCYCLE MOUNT PRO",
        currentPrice: 4200.00,
        originalPrice: 4500.00,
        discount: 7, // Percentage
        category: "Accessories",
        brand: "QuadLock",
        reviews: {
            count: 64,
            averageRating: 4.8
        },
        compatibility: [
            "Universal handlebar mount",
            "Requires QuadLock case for phone"
        ],
        mainImage: "assets/quadlock-main.jpg",
        additionalImages: [
            "assets/quadlock-angle1.jpg",
            "assets/quadlock-angle2.jpg"
        ],
        description: "The QuadLock Motorcycle Mount Pro features a vibration dampening system to protect your phone's camera with the patented twist-and-lock mechanism for secure mounting.",
        pickupLocation: "ST Moto & Gears Warehouse",
        pickupTime: "Usually ready in 1-2 days"
    },

}
// Export the products object
export default products;