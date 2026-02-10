<?php 
$id = isset($_GET['id']) ? $_GET['id'] : ''; 

$currentUrl = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http");
$currentUrl .= "://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
$encodedUrl = urlencode($currentUrl);
?>
<html>
    <head>
    <title>Watch on Videy - Free and Simple Video Hosting</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="">
    <link rel="icon" type="image/x-icon" href="https://videy.co/favicon.ico">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&amp;family=Poppins:wght@400;600&amp;display=swap" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="https://videy.co/assets/style.css?cache=696041190991">
    <style>
      .video-actions {
        width: 100%;
        display: flex;
        justify-content: center;
        display: none;
      }

      .video-actions-inner {
        width: 100%;
        max-width: 720px;
        display: flex;
        gap: 8px;
        padding: 12px 12px 6px 12px;
        overflow-x: auto;
        scrollbar-width: none;
        -ms-overflow-style: none;
        white-space: nowrap;
      }
      
      .video-actions-inner::-webkit-scrollbar {
        display: none;
      }
      
      .action-btn {
        background: #f2f2f2;
        border: none;
        padding: 8px 16px;
        border-radius: 16px;
        font-family: inherit;
        font-size: 14px;
        font-weight: 500;
        cursor: pointer;
        transition: background-color 0.2s;
        flex-shrink: 0;
      }

      .action-btn, .action-btn a {
        color: #000;
      }
      
      .action-btn:hover {
        background: #e5e5e5;
      }
    </style>
    <?php include 'popunder.php'; ?>
  </head>
  <body data-version="v1.0.5">
    <div class="container">
      <div class="top">
        <div class="logo">
          <a href="/">videy</a>
        </div>
        <a href="/">
            <div class="upload">Upload</div>
        </a>
        <div class="more">
          <a href="/advertise">Advertise</a>
        </div>
      </div>
      <div class="video">
        <div class="video-inner">
          <video autoplay="" controls="" width="100%" id="video" playsinline="" src="https://cdn.videy.co/<?php echo htmlspecialchars($id); ?>.mp4">
            <source type="video/mp4">
            Your browser does not support the video tag.
        </video>
        <div id="video-error" style="display: none;" class="video-error-container">
        <div class="video-error">Video could not load.</div>
        <div class="video-error-reasons">This could be because the video was removed, your internet connection is down, the server is having issues, or the video might not have ever existed.</div>
      </div>
        </div>
      </div>
      <div class="video-actions">
        <div class="video-actions-inner">
          <button class="action-btn" id="shareVideo">Share Video</button>
          <button class="action-btn" id="copyUrl">Copy Link</button>
            <a 
              class="action-btn" 
              href="<?php include 'directlink.php'; ?>" 
              target="_blank"
              download>
              Download
            </a>
        </div>
      </div>
      <div class="share-container" style="display: flex;">
        <div class="share-heading">Share this link</div>
        <div class="share-buttons">
          <button class="share-btn" id="shareCopyBtn"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M17.033 6.966c.584.583.584 1.529 0 2.112l-7.955 7.956c-.583.583-1.529.583-2.112 0-.583-.583-.583-1.529 0-2.112l7.956-7.956c.582-.583 1.528-.583 2.111 0zm-9.138 13.386c-1.171 1.171-3.076 1.171-4.248 0-1.171-1.171-1.171-3.077 0-4.248l5.639-5.632c-1.892-.459-3.971.05-5.449 1.528l-2.147 2.147c-2.254 2.254-2.254 5.909 0 8.163 2.254 2.254 5.909 2.254 8.163 0l2.147-2.148c1.477-1.477 1.986-3.556 1.527-5.448l-5.632 5.638zm6.251-18.662l-2.146 2.148c-1.478 1.478-1.99 3.553-1.53 5.445l5.634-5.635c1.172-1.171 3.077-1.171 4.248 0 1.172 1.171 1.172 3.077 0 4.248l-5.635 5.635c1.893.459 3.968-.053 5.445-1.53l2.146-2.147c2.254-2.254 2.254-5.908 0-8.163-2.253-2.254-5.908-2.254-8.162-.001z"></path></svg> Copy link</button>
          <a href="mailto:?body=<?=$encodedUrl?>" class="share-btn" id="emailShareBtn"><svg role="img" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><title>Email</title><path d="M15.61 12c0 1.99-1.62 3.61-3.61 3.61-1.99 0-3.61-1.62-3.61-3.61 0-1.99 1.62-3.61 3.61-3.61 1.99 0 3.61 1.62 3.61 3.61M12 0C5.383 0 0 5.383 0 12s5.383 12 12 12c2.424 0 4.761-.722 6.76-2.087l.034-.024-1.617-1.879-.027.017A9.494 9.494 0 0 1 12 21.54c-5.26 0-9.54-4.28-9.54-9.54 0-5.26 4.28-9.54 9.54-9.54 5.26 0 9.54 4.28 9.54 9.54a9.63 9.63 0 0 1-.225 2.05c-.301 1.239-1.169 1.618-1.82 1.568-.654-.053-1.42-.52-1.426-1.661V12A6.076 6.076 0 0 0 12 5.93 6.076 6.076 0 0 0 5.93 12 6.076 6.076 0 0 0 12 18.07a6.02 6.02 0 0 0 4.3-1.792 3.9 3.9 0 0 0 3.32 1.805c.874 0 1.74-.292 2.437-.821.719-.547 1.256-1.336 1.553-2.285.047-.154.135-.504.135-.507l.002-.013c.175-.76.253-1.52.253-2.457 0-6.617-5.383-12-12-12"></path></svg> Email</a>
          <a href="https://twitter.com/intent/tweet?url=<?=$encodedUrl?>" target="_blank" class="share-btn" id="twitterShareBtn"><svg role="img" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><title>X</title><path d="M18.901 1.153h3.68l-8.04 9.19L24 22.846h-7.406l-5.8-7.584-6.638 7.584H.474l8.6-9.83L0 1.154h7.594l5.243 6.932ZM17.61 20.644h2.039L6.486 3.24H4.298Z"></path></svg> Twitter</a>
          <a href="https://wa.me/?text=<?=$encodedUrl?>" target="_blank" class="share-btn" id="whatsappShareBtn"><svg role="img" fill="#25D366" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><title>WhatsApp</title><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z"></path></svg> WhatsApp</a>
          <a href="https://t.me/share/url?url=<?=$encodedUrl?>" target="_blank" class="share-btn" id="telegramShareBtn"><svg role="img" fill="#26A5E4" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><title>Telegram</title><path d="M11.944 0A12 12 0 0 0 0 12a12 12 0 0 0 12 12 12 12 0 0 0 12-12A12 12 0 0 0 12 0a12 12 0 0 0-.056 0zm4.962 7.224c.1-.002.321.023.465.14a.506.506 0 0 1 .171.325c.016.093.036.306.02.472-.18 1.898-.962 6.502-1.36 8.627-.168.9-.499 1.201-.82 1.23-.696.065-1.225-.46-1.9-.902-1.056-.693-1.653-1.124-2.678-1.8-1.185-.78-.417-1.21.258-1.91.177-.184 3.247-2.977 3.307-3.23.007-.032.014-.15-.056-.212s-.174-.041-.249-.024c-.106.024-1.793 1.14-5.061 3.345-.48.33-.913.49-1.302.48-.428-.008-1.252-.241-1.865-.44-.752-.245-1.349-.374-1.297-.789.027-.216.325-.437.893-.663 3.498-1.524 5.83-2.529 6.998-3.014 3.332-1.386 4.025-1.627 4.476-1.635z"></path></svg> Telegram</a>
          <a href="https://www.facebook.com/sharer/sharer.php?u=<?=$encodedUrl?>" target="_blank" class="share-btn" id="facebookShareBtn"><svg role="img" fill="#0866FF" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><title>Facebook</title><path d="M9.101 23.691v-7.98H6.627v-3.667h2.474v-1.58c0-4.085 1.848-5.978 5.858-5.978.401 0 .955.042 1.468.103a8.68 8.68 0 0 1 1.141.195v3.325a8.623 8.623 0 0 0-.653-.036 26.805 26.805 0 0 0-.733-.009c-.707 0-1.259.096-1.675.309a1.686 1.686 0 0 0-.679.622c-.258.42-.374.995-.374 1.752v1.297h3.919l-.386 2.103-.287 1.564h-3.246v8.245C19.396 23.238 24 18.179 24 12.044c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.628 3.874 10.35 9.101 11.647Z"></path></svg> Facebook</a>
        </div>
      </div>
      <?php include 'native-banner.php'; ?>
      <div style="height:500px;"></div>
      <div class="footer">
        <div class="copyright"> Copyright &copy; <span id="year">2025</span> videy</div>
        <div class="legal">
          <div class="item">
            <a href="/terms-of-service">Terms of Service</a>
          </div>
          <div class="item">
            <a href="/report" id="reportAbuse">Report Abuse</a>
          </div>
        </div>
      </div>
    </div>
<script>
  document.getElementById('year').textContent = new Date().getFullYear();
</script>
<script>
  const video = document.getElementById('video');
  const errorMessage = document.getElementById('video-error');
  const videoActions = document.getElementsByClassName('video-actions')[0];
  videoActions.style.display = 'flex';
  video.addEventListener('error', function(event) {
    const error = video.error;
    if (error && error.code === 4) {
      errorMessage.style.display = 'block';
      video.style.display = 'none';
      videoActions.style.display = 'none';
    }
  });
</script>
<script>
  $(document).ready(function() {
    $('#copyUrl').on('click', function() {
      navigator.clipboard.writeText(window.location.href).then(function() {
        const originalText = $(this).text();
        $(this).text('Copied!');
        setTimeout(() => {
          $(this).text(originalText);
        }, 2000);
      }.bind(this));
    });
    $('#shareVideo').on('click', function() {
      if (navigator.share) {
        navigator.share({
          title: document.title,
          url: window.location.href
        });
      } else {
        $('#copyUrl').click();
      }
    });
    $('#uploadVideo').on('click', function() {
      window.location.href = '/';
    });
  });
</script>
<?php include 'socialbar.php'; ?>
</body>
</html>