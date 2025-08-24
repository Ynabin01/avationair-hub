<!-- Team Page Header -->
<div class="nh-team-header">
    <h2 class="mv-section-title">
        <span class="mission">Meet Our</span>
        <span class="vision"> Expert Team</span>
    </h2>
</div>

<!-- Team Members Section -->
<div class="container nh-team-container py-5">
    <div class="row g-4 justify-content-center">
        @foreach($goal as $member)
        <div class="col-lg-3 col-md-6 d-flex justify-content-center">
            <div class="nh-team-card">

                <!-- Background Image -->
                <div class="nh-team-photo"
                    style="background-image: url('{{ $member->banner_image ?? '/website/img/default-profile.png' }}');">

                    <!-- Overlay -->
                    <div class="overlay"></div>

                    <!-- Text -->
                    <div class="nh-team-content">
                        <div class="nh-team-text-wrapper">
                            <p class="nh-team-role">{{ $member->caption ?? '' }}</p>
                            <h5 class="nh-team-name"> {!! htmlspecialchars_decode($member->short_content ?? '') !!}</h5>
                            <!-- Socials -->
                            <div class="nh-team-socials">
                                <a href="{{ $member->fb_link ?? '#' }}" target="_blank"><i class="fab fa-facebook-f"></i></a>
                                <a href="{{ $member->twit_link ?? '#' }}" target="_blank"><i class="fab fa-twitter"></i></a>
                                <a href="{{ $member->link_link ?? '#' }}" target="_blank"><i class="fab fa-linkedin-in"></i></a>
                            </div>

                            <!-- Hidden long content for popup -->
                           <div class="nh-team-long-content d-none" style="text-align: justify;">
                                {!! htmlspecialchars_decode($member->long_content ?? '') !!}
                            </div>

                        </div>
                    </div>
                </div>

            </div>
        </div>
        @endforeach
    </div>
</div>

<!-- Popup Modal -->
<div id="teamMessageModal" class="team-message-modal">
    <div class="modal-overlay"></div>
    <div class="modal-content">
        <button class="modal-close" aria-label="Close">&times;</button>
        <div class="modal-body">
            <div class="modal-left">
                <img src="" alt="Team Member" class="modal-photo">
            </div>
            <div class="modal-right">
                <h3 class="modal-name"></h3>
                <p class="modal-role"></p>
                <p class="modal-message"></p>
                <div class="modal-socials">
                    <a href="#" target="_blank" class="modal-fb"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" target="_blank" class="modal-twitter"><i class="fab fa-twitter"></i></a>
                    <a href="#" target="_blank" class="modal-linkedin"><i class="fab fa-linkedin-in"></i></a>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Styles -->
<style>
/* Team Header */
.nh-team-header { text-align: center; margin: 50px 0 30px; font-family: 'Montserrat', sans-serif; }

/* Team Cards */
.nh-team-card { border-radius: 20px; overflow: hidden; position: relative; box-shadow: 0 8px 25px rgba(0,0,0,0.25); transition: all 0.4s ease; cursor: pointer; }
.nh-team-card:hover { transform: translateY(-8px) scale(1.03); box-shadow: 0 18px 38px rgba(0,0,0,0.35); }
.nh-team-photo { width: 100%; min-height: 300px; background-size: cover; background-position: center; display: flex; align-items: flex-end; justify-content: center; position: relative; }
.nh-team-photo .overlay { position: absolute; inset: 0; background: rgba(255,0,0,0.35); backdrop-filter: blur(4px); opacity: 0; transition: all 0.4s ease; z-index: 1; }
.nh-team-card:hover .overlay { opacity: 1; }
.nh-team-content { position: relative; z-index: 2; text-align: center; width: 100%; padding: 0.5rem; transition: all 0.4s ease; }
.nh-team-text-wrapper { padding: 10px 15px; border-radius: 10px; display: flex; flex-direction: column; align-items: center; color: #fff; text-shadow: 0 2px 6px rgba(0,0,0,0.8); }
.nh-team-name { font-size: 1.55rem; font-weight: 700; margin: 4px 0; color: #fff; }
.nh-team-role { font-size: 1.05rem; font-weight: 600; margin-bottom: 4px; color: #f1f1f1; }
.nh-team-socials { display: flex; justify-content: center; gap: 10px; }
.nh-team-socials a { color: #fff; font-size: 1.2rem; transition: all 0.3s ease; }
.nh-team-socials a:hover { color: #ffd2d2; transform: scale(1.25); }

/* Popup Modal */
.team-message-modal { display: none; position: fixed; inset: 0; z-index: 9999; justify-content: center; align-items: center; font-family: 'Montserrat', sans-serif; }
.team-message-modal.active { display: flex; }

.modal-overlay { position: absolute; inset: 0; background: rgba(0,0,0,0.5); backdrop-filter: blur(2px); cursor: pointer; }

.modal-content {
    position: relative;
    max-width: 635px;
    width: 85%;
    background: #fff;
    border-radius: 20px;
    padding: 20px 25px;
    display: flex;
    gap: 15px;
    flex-wrap: wrap;
    box-shadow: 0 20px 50px rgba(0,0,0,0.2);
    transform: scale(0.7) translateY(50px);
    opacity: 0;
    transition: all 0.35s ease-out;
}

.team-message-modal.active .modal-content {
    transform: scale(1) translateY(0);
    opacity: 1;
    animation: popIn 0.35s ease-out forwards;
}

@keyframes popIn {
    0% { transform: scale(0.7) translateY(50px); opacity: 0; }
    50% { transform: scale(1.05) translateY(-10px); opacity: 1; }
    100% { transform: scale(1) translateY(0); opacity: 1; }
}

/* Close Button */
.modal-close {
    position: absolute;
    top: 10px;
    right: 10px;
    font-size: 1.7rem;
    color: #555;
    background: #fff;
    border-radius: 50%;
    border: none;
    width: 50px;
    height: 50px;
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    box-shadow: 0 4px 12px rgba(0,0,0,0.15);
    transition: all 0.2s ease;
    z-index: 10;
}
.modal-close:hover { color: #ff4d4d; transform: scale(1.1); }

/* Modal Body */
.modal-body { display: flex; gap: 12px; align-items: center; flex-wrap: wrap; padding-bottom: 8px; }
.modal-left { flex: 0 0 35%; display: flex; justify-content: center; }
.modal-right { flex: 0 0 60%; display: flex; flex-direction: column; justify-content: center; }

.modal-photo { width: 110px; height: 110px; border-radius: 50%; border: 3px solid #ff4d4d; object-fit: cover; box-shadow: 0 5px 15px rgba(0,0,0,0.2); animation: imagePop 0.4s ease-out; }
@keyframes imagePop { 0% { transform: scale(0.5); opacity: 0; } 70% { transform: scale(1.1); opacity: 1; } 100% { transform: scale(1); opacity: 1; } }

.modal-name { font-size: 1.5rem; font-weight: 700; margin-bottom: 3px; color: #222; animation: textPop 0.4s ease-out 0.1s both; }
.modal-role { font-size: 1rem; color: #555; margin-bottom: 8px; animation: textPop 0.4s ease-out 0.2s both; }
.modal-message { font-size: 0.95rem; line-height: 1.5; color: #333; margin-bottom: 12px; max-height: 150px; overflow-y: auto; padding-right: 4px; animation: textPop 0.4s ease-out 0.3s both; }

.modal-message::-webkit-scrollbar { width: 4px; }
.modal-message::-webkit-scrollbar-thumb { background: #ff4d4d; border-radius: 3px; }

.modal-socials a { font-size: 1.2rem; margin-right: 8px; color: #555; transition: all 0.3s ease; animation: textPop 0.4s ease-out 0.4s both; }
.modal-socials a:hover { color: #ff4d4d; transform: scale(1.2); }

@keyframes textPop { 0% { transform: translateY(15px); opacity: 0; } 100% { transform: translateY(0); opacity: 1; } }

@media (max-width: 768px) {
    .modal-body { flex-direction: column; text-align: center; gap: 10px; }
    .modal-left, .modal-right { flex: 0 0 100%; }
    .modal-photo { width: 100px; height: 100px; margin: 0 auto; }
    .modal-message { max-height: 180px; }
}
</style>

<!-- Script -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    const modal = document.getElementById('teamMessageModal');
    const modalClose = document.querySelector('.modal-close');
    const modalOverlay = document.querySelector('.modal-overlay');

    document.querySelectorAll('.nh-team-card').forEach(card => {
        card.addEventListener('click', () => {
            const img = card.querySelector('.nh-team-photo').style.backgroundImage.slice(5, -2);
            const name = card.querySelector('.nh-team-name').textContent;
            const role = card.querySelector('.nh-team-role').textContent;
            const message = card.querySelector('.nh-team-long-content').textContent; // long content
            const fb = card.querySelector('.nh-team-socials a[href*="facebook"]')?.href || '#';
            const twitter = card.querySelector('.nh-team-socials a[href*="twitter"]')?.href || '#';
            const linkedin = card.querySelector('.nh-team-socials a[href*="linkedin"]')?.href || '#';

            modal.querySelector('.modal-photo').src = img;
            modal.querySelector('.modal-name').textContent = name;
            modal.querySelector('.modal-role').textContent = role;
            modal.querySelector('.modal-message').textContent = message;
            modal.querySelector('.modal-fb').href = fb;
            modal.querySelector('.modal-twitter').href = twitter;
            modal.querySelector('.modal-linkedin').href = linkedin;

            modal.classList.add('active');
        });
    });

    function closeModal() { modal.classList.remove('active'); }
    modalClose.addEventListener('click', closeModal);
    modalOverlay.addEventListener('click', closeModal);
});
</script>
