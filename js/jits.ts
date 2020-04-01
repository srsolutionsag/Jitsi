namespace il {
    export namespace Jitsi {
        class ApiWrapper {
            // @ts-ignore
            private api: JitsiMeetExternalAPI;
            private participant: object;
            public tileView: false;
            public audioMuted: false;
            public videoMuted: false;

            constructor(api: JitsiMeetExternalAPI, participant: object) {
                this.api = api;
                this.participant = participant;
                const self = this;
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

            toggleVideo(): void {
                this.api.executeCommand('toggleVideo');
            }

            isVideoMuted(): boolean {
                return this.videoMuted;
            }

            muteAll(): void {

            }

            toggleAudio(): void {
                this.api.executeCommand('toggleAudio');
            }

            isAudioMuted(): boolean {
                return this.audioMuted;
            }

            enableTileView(): void {
                if (!this.tileView) {
                    console.log('toggle again');
                    this.toggleTileView();
                }
            }

            toggleTileView(): void {
                this.api.executeCommand('toggleTileView');
            }

            isTileView(): boolean {
                return this.tileView;
            }

            setPassword(password: string): void {
                this.api.executeCommand('password', password);
            }

            setRoomName(room_name: string): void {
                this.api.executeCommand('subject', room_name);
            }

            raw(): JitsiMeetExternalAPI {
                return this.api;
            }

        }

        let api_wapper;

        export function api(): ApiWrapper {
            return api_wapper;
        }

        export function init(base_configuration: string) {
            console.log(base_configuration);
            base_configuration = JSON.parse(base_configuration);
            console.log(base_configuration);
            let domain = base_configuration['domain'];
            let options = {
                roomName: base_configuration['roomId'],
                height: base_configuration['height'],
                parentNode: document.querySelector(base_configuration['parentNode']),
                configOverwrite: base_configuration['configOverwrite'],
                interfaceConfigOverwrite: base_configuration['interfaceConfigOverwrite']
            };
            // @ts-ignore
            let api = new JitsiMeetExternalAPI(domain, options);
            let participant = base_configuration['participant'];
            api.executeCommand('displayName', participant['displayName']);

            api_wapper = new ApiWrapper(api, participant);

            api_wapper.toggleAudio();

            if (participant['moderator'] === true) {
                console.log('moderator');
                api_wapper.enableTileView();
                api_wapper.setPassword(base_configuration['password']);
                api_wapper.setRoomName(base_configuration['roomName']);
            }
        }
    }

}
