    </main>

    <!-- Footer -->
    <footer class="bg-gray-800/50 border-t border-gray-700">
        <div class="container mx-auto px-6 py-12">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <!-- About Column -->
                <div class="md:col-span-2">
                    <a href="<?= base_url() ?>" class="text-2xl font-bold inline-block mb-4">
                        <span class="text-gradient">Portfolio</span>
                    </a>
                    <p class="text-gray-400 mb-6 max-w-md">
                        Passionate about creating innovative web solutions. Let's work together to bring your ideas to life.
                    </p>
                    <div class="flex space-x-4">
                        <?php if(isset($social)): foreach($social as $s): ?>
                        <a href="<?= esc($s['link']) ?>" target="_blank"
                           class="w-10 h-10 rounded-full bg-gray-700 flex items-center justify-center hover:bg-purple-600 transition-all duration-300 hover:scale-110"
                           title="<?= esc($s['name']) ?>">
                            <i class="fab <?= esc($s['icon']) ?>"></i>
                        </a>
                        <?php endforeach; endif; ?>
                    </div>
                </div>

                <!-- Quick Links -->
                <div>
                    <h4 class="text-lg font-semibold mb-4">Quick Links</h4>
                    <ul class="space-y-2">
                        <li><a href="#home" class="text-gray-400 hover:text-purple-500 transition-colors">Home</a></li>
                        <li><a href="#about" class="text-gray-400 hover:text-purple-500 transition-colors">About</a></li>
                        <li><a href="#services" class="text-gray-400 hover:text-purple-500 transition-colors">Services</a></li>
                        <li><a href="#projects" class="text-gray-400 hover:text-purple-500 transition-colors">Projects</a></li>
                        <li><a href="#contact" class="text-gray-400 hover:text-purple-500 transition-colors">Contact</a></li>
                    </ul>
                </div>

                <!-- Contact Info -->
                <div>
                    <h4 class="text-lg font-semibold mb-4">Contact Info</h4>
                    <ul class="space-y-3">
                        <li class="flex items-center text-gray-400">
                            <i class="fas fa-envelope text-purple-500 mr-3 w-5"></i>
                            <span><?= esc($email ?? 'info@example.com') ?></span>
                        </li>
                        <li class="flex items-center text-gray-400">
                            <i class="fas fa-phone text-purple-500 mr-3 w-5"></i>
                            <span><?= esc($phone ?? '+91 9876543210') ?></span>
                        </li>
                        <li class="flex items-center text-gray-400">
                            <i class="fas fa-map-marker-alt text-purple-500 mr-3 w-5"></i>
                            <span><?= esc($location ?? 'India') ?></span>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Footer Bottom -->
            <div class="border-t border-gray-700 mt-10 pt-8 flex flex-col md:flex-row justify-between items-center">
                <p class="text-gray-400 text-sm">
                    &copy; <?= date('Y') ?> <span class="text-gradient font-semibold"><?= esc($name ?? 'Portfolio') ?></span>. All rights reserved.
                </p>
                <p class="text-gray-400 text-sm mt-4 md:mt-0">
                    Designed with <i class="fas fa-heart text-red-500"></i> in India
                </p>
            </div>
        </div>
    </footer>

    <!-- Scroll to Top Button -->
    <button id="scroll-top" class="fixed bottom-8 right-8 w-12 h-12 rounded-full bg-purple-600 text-white flex items-center justify-center opacity-0 invisible transition-all duration-300 hover:bg-purple-700 hover:scale-110 z-30">
        <i class="fas fa-arrow-up"></i>
    </button>

    <!-- Scripts -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="<?= base_url('js/main.js') ?>"></script>
</body>
</html>
