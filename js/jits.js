var il;
(function (il) {
    var Jitsi;
    (function (Jitsi) {
        var ApiWrapper = /** @class */ (function () {
            // @ts-ignore
            function ApiWrapper(api, participant) {
                this.api = api;
                this.participant = participant;
                var self = this;
                this.api.addEventListener('tileViewChanged', function (o) {
                    self.tileView = o.enabled;
                });
                this.api.addEventListener('audioMuteStatusChanged', function (o) {
                    self.audioMuted = o.muted;
                });
                this.api.addEventListener('videoMuteStatusChanged', function (o) {
                    self.videoMuted = o.muted;
                });
                this.api.addEventListener('toggleVideo', function (o) {
                    self.videoMuted = o.muted;
                });
            }
            ApiWrapper.prototype.toggleVideo = function () {
                this.api.executeCommand('toggleVideo');
            };
            ApiWrapper.prototype.isVideoMuted = function () {
                return this.videoMuted;
            };
            ApiWrapper.prototype.muteAll = function () {
            };
            ApiWrapper.prototype.setUserName = function (username) {
                this.api.executeCommand('displayName', username);
            };
            ApiWrapper.prototype.toggleAudio = function () {
                this.api.executeCommand('toggleAudio');
            };
            ApiWrapper.prototype.isAudioMuted = function () {
                return this.audioMuted;
            };
            ApiWrapper.prototype.enableTileView = function () {
                if (!this.tileView) {
                    console.log('toggle again');
                    this.toggleTileView();
                }
            };
            ApiWrapper.prototype.toggleTileView = function () {
                this.api.executeCommand('toggleTileView');
            };
            ApiWrapper.prototype.isTileView = function () {
                return this.tileView;
            };
            ApiWrapper.prototype.setPassword = function (password) {
                this.api.executeCommand('password', password);
            };
            ApiWrapper.prototype.setRoomName = function (room_name) {
                this.api.executeCommand('subject', room_name);
            };
            // @ts-ignore
            ApiWrapper.prototype.raw = function () {
                return this.api;
            };
            return ApiWrapper;
        }());
        var api_wapper;
        function api() {
            return api_wapper;
        }
        Jitsi.api = api;
        function init(base_configuration) {
            console.log(base_configuration);
            base_configuration = JSON.parse(base_configuration);
            console.log(base_configuration);
            var domain = base_configuration['domain'];
            var options = {
                roomName: base_configuration['roomId'],
                height: base_configuration['height'],
                parentNode: document.querySelector(base_configuration['parentNode']),
                configOverwrite: base_configuration['configOverwrite'],
                interfaceConfigOverwrite: base_configuration['interfaceConfigOverwrite']
            };
            // @ts-ignore
            var api = new JitsiMeetExternalAPI(domain, options);
            var participant = base_configuration['participant'];
            api_wapper = new ApiWrapper(api, participant);
            api_wapper.setUserName(participant['displayName']);
            api_wapper.toggleAudio();
            if (participant['moderator'] === true) {
                console.log('moderator');
                api_wapper.enableTileView();
                api_wapper.setPassword(base_configuration['password']);
                api_wapper.setRoomName(base_configuration['roomName']);
            }
        }
        Jitsi.init = init;
    })(Jitsi = il.Jitsi || (il.Jitsi = {}));
})(il || (il = {}));
